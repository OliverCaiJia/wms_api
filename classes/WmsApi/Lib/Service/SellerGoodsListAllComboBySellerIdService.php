<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\SellerComboGoods;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use WmsApi\Lib\Model\SellerGoods;


class SellerGoodsListAllComboBySellerIdService extends ServiceBase
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
        $sellerGoodsList = SellerGoods::listBySellerId($this->sellerId);
        $returnList = [];
        foreach ($sellerGoodsList as $sellerGoods) {
            if ($sellerGoods->getIsCombo()){
                $returnList[$sellerGoods->getId()] = SellerComboGoods::listByComboId($sellerGoods->getId());
            }
        }
        return new SuccessResultDO($returnList);
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
        