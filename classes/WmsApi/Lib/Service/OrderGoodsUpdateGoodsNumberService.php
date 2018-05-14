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


class OrderGoodsUpdateGoodsNumberService extends ServiceBase
{
    /**
     * @var OrderGoods
     */
    protected $newOrderGoods;

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
    public function beforeExecute()
    {
        $orderGoods = OrderGoods::findUniqueByPKId($this->newOrderGoods->getId());
        if ($orderGoods === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        $order = Order::findUniqueByPKId($orderGoods->getOrderId());
        if ((int)$order->getStatus() !== OrderStatusEnum::WAIT_VERIFY){
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_STATUS_ERROR));
        }
        return new SuccessResultDO();
    }

    /**
     * @return ServiceResultDO
     */
    public function execute()
    {   
        $orderGoods = OrderGoods::findUniqueByPKId($this->newOrderGoods->getId());
        if ($orderGoods === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        $orderGoods->copyPropFrom($this->newOrderGoods);
        if (!$orderGoods->update()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR, 
                'execute update orderGoods error: ' .
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
     * @param OrderGoods $newOrderGoods
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain(OrderGoods $newOrderGoods = null, $userId = null)
    {
        $this->newOrderGoods = $newOrderGoods;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        