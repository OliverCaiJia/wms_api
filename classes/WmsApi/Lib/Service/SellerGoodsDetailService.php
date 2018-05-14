<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use WmsApi\Lib\Model\SellerGoods;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;

class SellerGoodsDetailService extends ServiceBase
{       
    /**
     * @var int
     */
    protected $id;
            
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
        $sellerGoods = SellerGoods::findUniqueByPKId($this->id);
        if ($sellerGoods === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_NOT_EXISTS));
        }
        return new SuccessResultDO($sellerGoods);
    }

    /**
     * @param int $id
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($id = null,$userId = null)
    {   
        $this->id = $id;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        