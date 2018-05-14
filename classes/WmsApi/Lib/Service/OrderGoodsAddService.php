<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\Order;
use WmsApi\Lib\Model\OrderGoods;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;
use WmsApi\Lib\Model\SellerGoods;
use WmsApi\Lib\Model\SellerPlatformGoods;


class OrderGoodsAddService extends ServiceBase
{
    /**
     * @var OrderGoods
     */
    protected $orderGoods;

    /**
     * @return ServiceResultDO
     */
    public function getRole()
    {
        return $this->setRoleByOrderId($this->orderGoods->getOrderId());
    }

    /**
     * @return ServiceResultDO
     */
    public function beforeExecute()
    {
        $order = Order::findUniqueByPKId($this->orderGoods->getOrderId());
        if ($order === null) {
             return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_NOT_EXISTS));
        }
        if ((int)$order->getStatus() !== OrderStatusEnum::WAIT_VERIFY){
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_STATUS_ERROR));
        }
        $sellerGoods = SellerGoods::findUniqueByPKId($this->orderGoods->getSellerGoodsId());
        if ($sellerGoods === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_NOT_EXISTS));
        }
        $sellerPlatformGoods = SellerPlatformGoods::findUniqueByUK([
            'seller_id' => $order->getSellerId(),
            'seller_goods_id' =>$this->orderGoods->getSellerGoodsId(),
            'platform_source_id' =>$order->getPlatformSourceId()
        ]);
        if ($sellerPlatformGoods !== null && $sellerPlatformGoods->getUniqueCode()){
            $this->orderGoods->setUniqueCode($sellerPlatformGoods->getUniqueCode());
        }

        $this->orderGoods->setGoodsName($sellerGoods->getName());
        $this->orderGoods->setPrice($sellerGoods->getPrice());
        $this->orderGoods->setIsSplit(0);
        return new SuccessResultDO();
    }

    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $isOrderGoods = OrderGoods::findUniqueByUK([
            'order_id' => $this->orderGoods->getOrderId(),
            'seller_goods_id' => $this->orderGoods->getSellerGoodsId(),
        ]);
        if ($isOrderGoods !== null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_GOODS_ALREADY_EXISTS));
        }
        if (!$this->orderGoods->create()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                'execute add orderGoods error: ' .
                $this->orderGoods->getMessages() . "\t" . json_encode($this->orderGoods));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        $orderGoodsService = new OrderGoodsService();
        $resOrderData = $orderGoodsService->calculateAndUpdateTotalPrice($this->orderGoods->getOrderId());
        if(!$resOrderData->isSuccess()){
            return $resOrderData;
        }
        return new SuccessResultDO($this->orderGoods->getId());
    }
        
    /**
     * @param OrderGoods $orderGoods
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain(OrderGoods $orderGoods = null, $userId = null)
    {
        $this->orderGoods = $orderGoods;
        $this->userId = $userId;
        return parent::executeChain();
    }

}
        