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


class OrderGoodsDeleteService extends ServiceBase
{       
    /**
     * @var int
     */
    protected $id;
            
    /**
     * @return ServiceResultDO
     */
    public function getRole()
    {
        return $this->setRoleByUserId();
    }
        
    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $orderGoods = OrderGoods::findUniqueByPKId($this->id);
        if ($orderGoods === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        $order = Order::findUniqueByPKId($orderGoods->getOrderId());
        if ((int)$order->getStatus() !== OrderStatusEnum::WAIT_VERIFY){
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_STATUS_ERROR));
        }
        $sellerGoods = SellerGoods::findUniqueByPKId($orderGoods->getSellerGoodsId());
        if ($sellerGoods === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_NOT_EXISTS));
        }
        if ((int)$sellerGoods->getSellerId() !== (int)$order->getSellerId()) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_NOT_EXISTS));
        }
        if (!$orderGoods->delete()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                'execute delete orderGoods error: ' .
                $orderGoods->getMessages() . "\t" . json_encode($orderGoods));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        $orderGoodsService = new OrderGoodsService();
        $resOrderData = $orderGoodsService->calculateAndUpdateTotalPrice($orderGoods->getOrderId());
        if(!$resOrderData->isSuccess()){
            return $resOrderData;
        }
        return new SuccessResultDO();
    }

    /**
     * @param int $id
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($id = null,$userId = null)
    {   
        $this->id = $id;
        $this->userId = $userId;
        return parent::executeChain();
    }


}
        