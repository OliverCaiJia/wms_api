<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use WmsApi\Lib\Model\Order;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class OrderListBySellerIdAndSuccessVerifyService extends ServiceBase
{
    /**
     * @var int
     */
    protected $sellerId;

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
    public function execute()
    {
        $orderList = Order::listBySellerIdAndStatus($this->sellerId,OrderStatusEnum::SUCCESS_VERIFY);
        return new SuccessResultDO($orderList);
    }

    /**
     * @param int $sellerId
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($sellerId = null,$userId = null)
    {
        $this->sellerId = $sellerId;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        