<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\Order;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;
use WmsApi\Lib\Model\OrderGoods;


class OrderWithdrawAuditService extends ServiceBase
{
    /**
     * @var Order
     */
    protected $orderId;

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
        $order = Order::findUniqueByPKId($this->orderId);
        if ($order === null){
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_NOT_EXISTS));
        }
        if ((int)$order->getStatus() !== OrderStatusEnum::SUCCESS_VERIFY){
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_STATUS_ERROR));
        }
        $orderGoodsList = OrderGoods::listByOrderId($order->getId());
        foreach ($orderGoodsList as $orderGoods) {
            if ($orderGoods->getIsSplit()){
                return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_GOODS_IS_ALREADY_SPLIT));
            }
        }
        return new SuccessResultDO();
    }


    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $order = Order::findUniqueByPKId($this->orderId);
        $order->setStatus(OrderStatusEnum::WAIT_VERIFY);
        if (!$order->update()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "execute update order error: " .
                $order->getMessages() . "\t" . json_encode($order));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO();
    }

    /**
     * @param int $orderId
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($orderId = null, $userId = null)
    {
        $this->orderId = $orderId;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
