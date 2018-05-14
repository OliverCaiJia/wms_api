<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\SellerGoods;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class SellerGoodsListBySellerIdAndNoComboService extends ServiceBase
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
        $sellerGoodsList = SellerGoods::listBySellerIdAndIsCombo($this->sellerId, 0);
        return new SuccessResultDO($sellerGoodsList);
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
        