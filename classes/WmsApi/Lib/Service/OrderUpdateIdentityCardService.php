<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\Order;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;


class OrderUpdateIdentityCardService extends ServiceBase
{
    /**
     * @var Order
     */
    protected $newOrder;

    /**
     * @return ServiceResultDO
     */
    public function getRole()
    {
        return $this->setRoleByOrderId($this->newOrder->getId());
    }
     
    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $order = Order::findUniqueByPKId($this->newOrder->getId());
        if ($order === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        $order->copyPropFrom($this->newOrder);
        if (!$order->update()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "execute update order error: " .
                $order->getMessages() . "\t" . json_encode($order));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO();
    }

    /**
     * @param Order $newOrder
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain(Order $newOrder = null, $userId = null)
    {
        $this->newOrder = $newOrder;
        $this->userId = $userId;
        return parent::executeChain();
    }
 }
        