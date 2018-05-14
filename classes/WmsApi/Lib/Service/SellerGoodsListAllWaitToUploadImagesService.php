<?php
namespace WmsApi\Lib\Service;

use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use WmsApi\Lib\Model\SellerGoods;


class SellerGoodsListAllWaitToUploadImagesService extends ServiceBase
{
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
        $sellerGoodsList = SellerGoods::listAll();
        $returnList = [];
        foreach($sellerGoodsList as $sellerGoods){
            if((string)$sellerGoods->getImage() === ""){
                $returnList[] = $sellerGoods;
            }
        }
        return new SuccessResultDO($returnList);
    }
        
    /**
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($userId = null)
    {
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        