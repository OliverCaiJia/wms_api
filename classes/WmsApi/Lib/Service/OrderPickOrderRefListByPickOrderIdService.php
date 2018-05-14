<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\OrderPickOrderRef;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class OrderPickOrderRefListByPickOrderIdService extends ServiceBase
{       
    /**
     * @var int
     */
    protected $pickOrderId;
            
    /**
     * @return ServiceResultDO
     */
    public function getRole()
    {
        $this->roles = [];
        return new SuccessResultDO();
    }
        
    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $orderPickOrderRefList = OrderPickOrderRef::listByPickOrderId($this->pickOrderId);
        return new SuccessResultDO($orderPickOrderRefList);
    }
    
    /**
     * @param int $pickOrderId
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($pickOrderId = null,$userId = null)
    {   
        $this->pickOrderId = $pickOrderId;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        