<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/16
 * Time: 下午10:33
 */

namespace WmsApi\Lib\Service;

use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhalconEnhance\Util\QueueUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;
use WmsApi\Lib\Constant\Enum\GoodsEncodeTypeEnum;
use WmsApi\Lib\Constant\Enum\LogisticOrderStatusEnum;
use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Constant\TubeName;
use WmsApi\Lib\Manager\AddressManager;
use WmsApi\Lib\Model\LogisticOrder;
use WmsApi\Lib\Model\Order;
use WmsApi\Lib\Model\OrderGoods;
use WmsApi\Lib\Model\OrderPickOrderRef;
use WmsApi\Lib\Model\PackOrder;
use WmsApi\Lib\Model\PackOrderGoods;
use WmsApi\Lib\Model\PickOrder;
use WmsApi\Lib\Model\PickOrderGoods;
use WmsApi\Lib\Model\Seller;
use WmsApi\Lib\Model\SellerComboGoods;
use WmsApi\Lib\Model\SellerFreightGroup;
use WmsApi\Lib\Model\SellerGoods;

class OrderSplitOrderService extends ServiceBase
{
    /**
     * @var int
     */
    protected $orderId;

    /**
     * @var array
     */
    protected $orderGoodsIds;

    /**
     * @var array
     */
    protected $splitOrderGoodsIds;

    /**
     * @var int
     */
    protected $district;

    /**
     * @var int
     */
    protected $logisticCompanyId;

    /**
     * @return ServiceResultDO
     */
    public function getRole()
    {
        return $this->setRoleByOrderId($this->orderId);
    }

    /**
     * @return ServiceResultDO
     */
    public function beforeExecute()
    {
        $order = Order::findUniqueByPKIdForUpdate($this->orderId);
        if ($order === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        if ((int)$order->getStatus() !== (int)OrderStatusEnum::SUCCESS_VERIFY
            && (int)$order->getStatus() !== (int)OrderStatusEnum::PART_SPLIT ) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_NO_VERIFY_SUCCESS));
        }
        $addressManager = new AddressManager();
        $returnData = $addressManager->getUsableAddress($order->getProvince(),$order->getCity(),$order->getDistrict());
        if (!$returnData->isSuccess()){
            return $returnData;
        }
        $district = $returnData->getData();
        $this->district = $district === 0 ? null : $district;
        $seller = Seller::findUniqueByPKId($order->getSellerId());
        if ($seller === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_NOT_EXISTS));
        }
        if ($seller->getSellerFreightGroupId() < 1) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_NOT_HAS_LOGISTIC_COMPANY));
        }
        if ((int)$this->logisticCompanyId > 0) {
            $sellerFreightGroup = SellerFreightGroup::findUniqueByUK([
                'seller_id' =>$order->getSellerId(),
                'logistic_company_id' => (int)$this->logisticCompanyId
            ]);
        } else{
            $sellerFreightGroup = SellerFreightGroup::findUniqueByPKId($seller->getSellerFreightGroupId());
        }
        if ($sellerFreightGroup === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_LOGISTIC_COMPANY_NOT_MATCH));
        }
        $this->logisticCompanyId = $sellerFreightGroup->getLogisticCompanyId();
        foreach ($this->orderGoodsIds as $orderGoodsId) {
            $orderGoods = OrderGoods::findUniqueByPKId($orderGoodsId);
            if ($orderGoods === null || (int)$orderGoods->getOrderId() !== (int)$this->orderId) {
                return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_GOODS_NOT_EXISTS));
            }
            $sellerGoods = SellerGoods::findUniqueByPKId($orderGoods->getSellerGoodsId());
            if ($sellerGoods === null) {
                return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_NOT_EXISTS));
            }
        }
        return new SuccessResultDO();
    }

    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $order = Order::findUniqueByPKIdForUpdate($this->orderId);
        // new logistic order
        $logisticOrder = new LogisticOrder();
        $logisticOrder->setConsigneeName($order->getConsigneeName());
        $logisticOrder->setConsigneeAddress($order->getConsigneeAddress());
        $logisticOrder->setPhoneNumber($order->getPhoneNumber());
        $logisticOrder->setLogisticCompanyId($this->logisticCompanyId);
        $logisticOrder->setIsExport(0);
        $logisticOrder->setProvince($order->getProvince());
        $logisticOrder->setCity($order->getCity());
        $logisticOrder->setDistrict($this->district);
        if ($order->getComment() !== null) {
            $logisticOrder->setComment($order->getComment());
        }
        if (!$logisticOrder->create()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                'split order execute add logisticOrder error: ' .
                $logisticOrder->getMessages() . "\t" . json_encode($logisticOrder));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        $logisticOrderId = $logisticOrder->getId();

        //1. new pack order
        $packOrder = new PackOrder();
        if (!$packOrder->create()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                'execute create pack order error: ' .
                $packOrder->getMessages() . "\t" . json_encode($packOrder));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        $packOrderId = $packOrder->getId();

        //2. new pick order
        $pickOrder = new PickOrder();
        $pickOrder->setSellerId($order->getSellerId());
        $pickOrder->setLogisticOrderId($logisticOrderId);
        $pickOrder->setAuditorId($this->userId);
        $pickOrder->setPackOrderId($packOrderId);
        $pickOrder->setStatus(LogisticOrderStatusEnum::WAIT_PICK);
        if (count($this->orderGoodsIds) === 1) {
            $orderGoodsId = current($this->orderGoodsIds);
            $orderGoods = OrderGoods::findUniqueByPKId($orderGoodsId);
            if ((int)$orderGoods->getGoodsNumber() === 1) {
                $pickOrder->setSellerGoodsId($orderGoods->getSellerGoodsId());
            }
        }
        if (!$pickOrder->create()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                'split order execute create pick order error: ' .
                $pickOrder->getMessages() . "\t" . json_encode($pickOrder));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        $pickOrderId = $pickOrder->getId();

        foreach ($this->orderGoodsIds as $orderGoodsId) {
            $orderGoods = OrderGoods::findUniqueByPKId($orderGoodsId);
            $sellerGoods = SellerGoods::findUniqueByPKId($orderGoods->getSellerGoodsId());

            //new pick order goods
            $pickOrderGoods = new PickOrderGoods();
            $pickOrderGoods->setPickOrderId($pickOrderId);
            $pickOrderGoods->setSellerGoodsId($orderGoods->getSellerGoodsId());
            $pickOrderGoods->setGoodsNumber($orderGoods->getGoodsNumber());
            if (!$pickOrderGoods->create()) {
                LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                    'split order execute create pick order goods error: ' .
                    $pickOrderGoods->getMessages() . "\t" . json_encode($pickOrderGoods));
                return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
            }
            $pickOrderGoodsId = $pickOrderGoods->getId();

            //new pack order goods
            switch ($sellerGoods->getEncodeType()) {
                case GoodsEncodeTypeEnum::BAR:
                    if ($sellerGoods->getIsCombo()){
                        $returnData = $this->cretePackOrderComboGoods($orderGoodsId,$packOrderId,$pickOrderGoodsId);
                        if (!$returnData->isSuccess()){
                            return $returnData;
                        }
                    } else {
                        $packOrderGoods = new PackOrderGoods();
                        $packOrderGoods->setPackOrderId($packOrderId);
                        $packOrderGoods->setSellerGoodsId($orderGoods->getSellerGoodsId());
                        $packOrderGoods->setEncodeType($sellerGoods->getEncodeType());
                        $packOrderGoods->setGoodsEncode($sellerGoods->getBarCode());
                        $packOrderGoods->setGoodsNumber($orderGoods->getGoodsNumber());
                        $packOrderGoods->setScannedNumber(0);
                        $packOrderGoods->setPickOrderGoodsId($pickOrderGoodsId);
                        if (!$packOrderGoods->create()) {
                            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                                'split order execute create pack order goods error: ' .
                                $packOrderGoods->getMessages() . "\t" . json_encode($packOrderGoods));
                            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
                        }
                    }
                    break;

                case GoodsEncodeTypeEnum::RFID || GoodsEncodeTypeEnum::UNIQUE:
                    if ($sellerGoods->getIsCombo()){
                        $returnData = $this->cretePackOrderComboGoods($orderGoodsId,$packOrderId,$pickOrderGoodsId);
                        if (!$returnData->isSuccess()){
                            return $returnData;
                        }
                    } else {
                        $scanGoodsNumber = $orderGoods->getGoodsNumber();
                        while ($scanGoodsNumber) {
                            $packOrderGoods = new PackOrderGoods();
                            $packOrderGoods->setPackOrderId($packOrderId);
                            $packOrderGoods->setSellerGoodsId($orderGoods->getSellerGoodsId());
                            $packOrderGoods->setEncodeType($sellerGoods->getEncodeType());
                            $packOrderGoods->setGoodsNumber(1);
                            $packOrderGoods->setScannedNumber(0);
                            $packOrderGoods->setPickOrderGoodsId($pickOrderGoodsId);
                            if (!$packOrderGoods->create()) {
                                LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                                    'split order execute create pack order goods error: ' .
                                    $packOrderGoods->getMessages() . "\t" . json_encode($packOrderGoods));
                                return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
                            }
                            $scanGoodsNumber--;
                        }
                    }
                    break;
            }

            //update seller goods inventory
            $sellerGoods->setInventory((int)$sellerGoods->getInventory() - (int)$orderGoods->getGoodsNumber());
            if (!$sellerGoods->update()) {
                LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                    'execute seller goods update inventory error: ' .
                    $sellerGoods->getMessages() . "\t" . json_encode($sellerGoods));
                return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
            }

            $orderGoods->setIsSplit(1);
            if (!$orderGoods->update()) {
                LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                    'split order execute update order goods is_split error: ' .
                    $orderGoods->getMessages() . "\t" . json_encode($orderGoods));
                return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
            }
            $this->splitOrderGoodsIds[] = $orderGoods->getId();
        }

        $orderPickOrderRef = new OrderPickOrderRef();
        $orderPickOrderRef->setOrderId($this->orderId);
        $orderPickOrderRef->setPickOrderId($pickOrderId);
        if (!$orderPickOrderRef->create()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                'split order execute add orderPickOrderRef error: ' .
                $orderPickOrderRef->getMessages() . "\t" . json_encode($orderPickOrderRef));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        $order->setStatus(OrderStatusEnum::SUCCESS_SPLIT);
        $orderGoodsList = OrderGoods::listByOrderId($this->orderId);
        foreach ($orderGoodsList as $orderGoods) {
            if (!$orderGoods->getIsSplit()) {
                $order->setStatus(OrderStatusEnum::PART_SPLIT);
            }
        }
        if (!$order->update()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                'split order execute update order error: ' .
                $order->getMessages() . "\t" . json_encode($order));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        QueueUtil::fireEventQueue(ServiceName::MQ_WMS, TubeName::CREATE_LOGISTIC_ELECTRONIC_ORDER, $logisticOrder->getId());
        return new SuccessResultDO();
    }

    /** @noinspection MoreThanThreeArgumentsInspection */
    /**
     * @param int $orderId
     * @param array $orderGoodsIds
     * @param int $logisticOrderId
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($orderId = null, $orderGoodsIds = null,$logisticOrderId = null, $userId = null)
    {
        $this->orderId = $orderId;
        $this->orderGoodsIds = $orderGoodsIds;
        if ((int)$logisticOrderId > 0) {
            $this->logisticCompanyId = $logisticOrderId;
        }
        $this->userId = $userId;
        return parent::executeChain();
    }

    /**
     * @param int $orderGoodsId
     * @param int $packOrderId
     * @param int $pickOrderGoodsId
     * @return ServiceResultDO
     */
    protected function cretePackOrderComboGoods($orderGoodsId, $packOrderId, $pickOrderGoodsId)
    {
        $pickOrderGoods = PickOrderGoods::findUniqueByPKId($pickOrderGoodsId);
        $comboId = $pickOrderGoods->getSellerGoodsId();
        $sellerGoods = SellerGoods::findUniqueByPKId($comboId);
        $sellerComboGoodsList = SellerComboGoods::listByComboId($comboId);
        $orderGoods = OrderGoods::findUniqueByPKId($orderGoodsId);
        foreach ($sellerComboGoodsList as $sellerComboGoods){
            $newSellerGoods = SellerGoods::findUniqueByPKId($sellerComboGoods->getSellerGoodsId());
            switch ($newSellerGoods->getEncodeType()) {
                case GoodsEncodeTypeEnum::BAR:
                    $goodsNumber = bcmul($orderGoods->getGoodsNumber(),$sellerComboGoods->getGoodsNumber());
                    $packOrderGoods = new PackOrderGoods();
                    $packOrderGoods->setPackOrderId($packOrderId);
                    $packOrderGoods->setSellerGoodsId($newSellerGoods->getId());
                    $packOrderGoods->setEncodeType($newSellerGoods->getEncodeType());
                    $packOrderGoods->setGoodsEncode($newSellerGoods->getBarCode());
                    $packOrderGoods->setGoodsNumber($goodsNumber);
                    $packOrderGoods->setScannedNumber(0);
                    $packOrderGoods->setPickOrderGoodsId($pickOrderGoodsId);
                    $packOrderGoods->setComboEncode($sellerGoods->getBarCode());
                    $packOrderGoods->setComboId($comboId);
                    if (!$packOrderGoods->create()) {
                        LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                            'split order execute create pack order goods by combo error: ' .
                            $packOrderGoods->getMessages() . "\t" . json_encode($packOrderGoods));
                        return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
                    }
                    break;
                case GoodsEncodeTypeEnum::RFID || GoodsEncodeTypeEnum::UNIQUE:
                    $scanGoodsNumber = bcmul($orderGoods->getGoodsNumber(),$sellerComboGoods->getGoodsNumber());
                    while ($scanGoodsNumber) {
                        $packOrderGoods = new PackOrderGoods();
                        $packOrderGoods->setPackOrderId($packOrderId);
                        $packOrderGoods->setSellerGoodsId($newSellerGoods->getId());
                        $packOrderGoods->setEncodeType($newSellerGoods->getEncodeType());
                        $packOrderGoods->setGoodsNumber(1);
                        $packOrderGoods->setScannedNumber(0);
                        $packOrderGoods->setPickOrderGoodsId($pickOrderGoodsId);
                        $packOrderGoods->setComboId($comboId);
                        if (!$packOrderGoods->create()) {
                            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                                'split order execute create pack order goods by combo error: ' .
                                $packOrderGoods->getMessages() . "\t" . json_encode($packOrderGoods));
                            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
                        }
                        $scanGoodsNumber--;
                    }
                    break;
            }
        }
        return new SuccessResultDO();
    }

}