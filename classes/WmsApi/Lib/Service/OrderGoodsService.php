<?php
/**
 * Created by PhpStorm.
 * User: baoal
 * Date: 2017/4/21
 * Time: 下午3:31
 */


namespace WmsApi\Lib\Service;

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

class OrderGoodsService extends ServiceBase
{
    /**
     * @param int $orderId
     * @return ServiceResultDO
     */
    public function calculateAndUpdateTotalPrice($orderId)
    {
        $order = Order::findUniqueByPKId($orderId);
        if ($order === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_NOT_EXISTS));
        }
        $orderGoodsList = OrderGoods::listByOrderId($orderId);
        $orderTotalPrice = 0.00;
        foreach($orderGoodsList as $orderGoods) {
            if ((float)$orderGoods->getPrice() > 0){
                $orderTotalPrice += bcmul((float)$orderGoods->getPrice(), (int)$orderGoods->getGoodsNumber(), 2);
            }
        }
        $order->setTotalPrice($orderTotalPrice);
        if (!$order->update()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                'execute goods update inventory error: ' .
                $order->getMessages() . "\t" . json_encode($order));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO();
    }

}
