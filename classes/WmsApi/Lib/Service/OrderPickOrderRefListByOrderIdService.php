<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\OrderPickOrderRef;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class OrderPickOrderRefListByOrderIdService extends ServiceBase
{       
    /**
     * @var int
     */
    protected $orderId;

    /**
     * @return ServiceResultDO
     */
    public function getRole()
    {
        return $this->setRoleByOrderId($this->orderId);
    }
        
    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $orderPickOrderRefList = OrderPickOrderRef::listByOrderId($this->orderId);
        return new SuccessResultDO($orderPickOrderRefList);
    }
    
    /**
     * @param int $orderId
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($orderId = null,$userId = null)
    {
        $this->orderId = $orderId;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        