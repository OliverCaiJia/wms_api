<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use WmsApi\Lib\Model\Order;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use WmsApi\Lib\Model\OrderGoods;


class OrderGoodsListSuccessSplitForCliService extends ServiceBase
{
    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $orderList = Order::listByEmptyConId(OrderStatusEnum::SUCCESS_SPLIT);
        $returnList = [];
        foreach ($orderList as $order) {
            $orderGoodsList = OrderGoods::listByOrderId($order->getId());
            $returnList[$order->getId()] = $orderGoodsList;
        }
        return new SuccessResultDO($orderList);
    }

    /**
     * @return ServiceResultDO
     */
    public function executeChain()
    {
        return parent::executeChain();
    }
}
        