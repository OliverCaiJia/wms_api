<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\SellerGoods;
use WmsApi\Lib\Model\SellerPlatformGoods;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class SellerGoodsListByPlatformSourceIdAndSellerIdService extends ServiceBase
{       
    /**
     * @var int
     */
    protected $sellerId;
            
    /**
     * @var int
     */
    protected $platformSourceId;
            
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
        $sellerPlatformGoodsList = SellerPlatformGoods::listByPlatformSourceIdAndSellerId($this->platformSourceId,$this->sellerId);
        $returnList = [];
        foreach ($sellerPlatformGoodsList as $sellerPlatformGoods) {
            if (!$sellerPlatformGoods->getDisabled())
            {
                $returnList[] = SellerGoods::findUniqueByPKId($sellerPlatformGoods->getSellerGoodsId());
            }
        }
        return new SuccessResultDO($returnList);
    }
    
    /**
     * @param int $sellerId
     * @param int $platformSourceId
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($sellerId = null,$platformSourceId = null,$userId = null)
    {   
        $this->sellerId = $sellerId;
        $this->platformSourceId = $platformSourceId;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        