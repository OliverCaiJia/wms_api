<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\SellerGoods;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class SellerGoodsListBySellerIdService extends ServiceBase
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
        $sellerGoodsList = SellerGoods::listBySellerId($this->sellerId);
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
        