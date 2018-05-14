<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\Order;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;


class OrderUpdateErpStatusService extends ServiceBase
{
    /**
     * @var array
     */
    protected $orderIds;

    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        foreach ($this->orderIds as $orderId => $connid) {
            $order = Order::findUniqueByPKId($orderId);
            if ($order === null) {
                return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
            }
            if ((int)$order->getConid() === 0) {
                $order->setConid($connid);
                if (!$order->update()) {
                    LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                        "execute update order error: " .
                        $order->getMessages() . "\t" . json_encode($order));
                    return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
                }
            }
        }
        return new SuccessResultDO();
    }

    /**
     * @param array $orderIds
     * @return ServiceResultDO
     */
    public function executeChain($orderIds = null)
    {

        $this->orderIds = $orderIds;
        return parent::executeChain();
    }
 }
        