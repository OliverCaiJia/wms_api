<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\OrderGoods;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class OrderGoodsListByOrderIdAndIsSplitService extends ServiceBase
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
        $orderGoodsList = OrderGoods::listByOrderId($this->orderId);
        $returnList = [];
        foreach ($orderGoodsList as $orderGoods){
            if ((int)$orderGoods->getIsSplit() === 0){
                $returnList[] = $orderGoods;
            }
        }
        return new SuccessResultDO($returnList);
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
        