<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\Order;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class OrderGoodsGetNextVerifyOrderBySellerIdService extends ServiceBase
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
        return $this->setRoleByUserId();
    }
        
    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $order = Order::getWaitVerifyOrder($this->sellerId);
        if ($order !== null){
            return new SuccessResultDO($order->getId());
        }
        return new SuccessResultDO();
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
        