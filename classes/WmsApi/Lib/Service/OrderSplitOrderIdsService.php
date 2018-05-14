<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/16
 * Time: 下午10:33
 */

namespace WmsApi\Lib\Service;


use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use WmsApi\Lib\Model\Order;
use WmsApi\Lib\Model\OrderGoods;
use WmsApi\Lib\Model\Seller;
use WmsApi\Lib\Model\SellerFreightGroup;

class OrderSplitOrderIdsService extends ServiceBase
{
    /**
     * @var array
     */
    protected $orderIds;

    /**
     * @var int
     */
    protected $sellerId;

    /**
     * @var int
     */
    protected $logisticCompanyId;

    /**
     * @return ServiceResultDO
     */
    public function getRole()
    {
        return $this->setRoleBySellerId($this->sellerId);
    }

    /**
     * @return ServiceResultDO
     */
    public function beforeExecute()
    {
        foreach ($this->orderIds as $orderId) {
            $order = Order::findUniqueByPKId($orderId);

            if ((int)$order->getStatus() !== OrderStatusEnum::SUCCESS_VERIFY
                && (int)$order->getStatus() !== OrderStatusEnum::PART_SPLIT) {
                return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_NOT_SPLIT_STATUS));
            }
            if ($order === null) {
                return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_NOT_EXISTS));
            }
        }
        $seller = Seller::findUniqueByPKId($this->sellerId);
        if ($seller === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_NOT_EXISTS));
        }

        if ((int)$this->logisticCompanyId > 0) {
            $sellerFreightGroup = SellerFreightGroup::findUniqueByUK([
                'seller_id' => $this->sellerId,
                'logistic_company_id' => (int)$this->logisticCompanyId
            ]);
        } else{
            $sellerFreightGroup = SellerFreightGroup::findUniqueByPKId($seller->getSellerFreightGroupId());
        }
        if ($sellerFreightGroup === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_LOGISTIC_COMPANY_NOT_MATCH));
        }
        $this->logisticCompanyId = $sellerFreightGroup->getLogisticCompanyId();
        return new SuccessResultDO();
    }

    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $orderSplitService = new OrderSplitOrderService();
        foreach ($this->orderIds as $orderId) {
            $order = Order::findUniqueByPKId($orderId);
            $orderGoodsList = OrderGoods::listByOrderId($order->getId());
            $orderGoodsIds = [];
            foreach ($orderGoodsList as $orderGoods) {
                if (!$orderGoods->getIsSplit()) {
                    $orderGoodsIds[] = $orderGoods->getId();
                }
            }
            $returnData = $orderSplitService->executeChain($order->getId(),$orderGoodsIds,$this->logisticCompanyId,$this->userId);
            if (!$returnData->isSuccess()) {
                return $returnData;
            }
        }
        return new SuccessResultDO();
    }

    /** @noinspection MoreThanThreeArgumentsInspection */
    /**
     * @param array $orderIds
     * @param int $sellerId
     * @param int $userId
     * @param int $logisticCompanyId
     * @return ServiceResultDO
     */
    public function executeChain($orderIds = null,$sellerId = null, $logisticCompanyId = null, $userId = null)
    {
        $this->orderIds = $orderIds;
        $this->sellerId = $sellerId;
        $this->logisticCompanyId = $logisticCompanyId;
        $this->userId = $userId;
        return parent::executeChain();
    }



}