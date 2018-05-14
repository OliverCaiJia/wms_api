<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use WmsApi\Lib\Model\Order;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class OrderListSuccessSplitForCliService extends ServiceBase
{
    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $orderList = Order::listByEmptyConId(OrderStatusEnum::SUCCESS_SPLIT);
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
        