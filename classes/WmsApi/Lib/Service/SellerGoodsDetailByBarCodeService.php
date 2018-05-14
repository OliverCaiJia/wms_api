<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\SellerGoods;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class SellerGoodsDetailByBarCodeService extends ServiceBase
{       
    /**
     * @var int
     */
    protected $sellerId;
            
    /**
     * @var string
     */
    protected $barCode;
            
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
        $sellerGoods = SellerGoods::findUniqueByUK([
            "seller_id" => $this->sellerId,
            "bar_code" => $this->barCode,
        ]);
        if ($sellerGoods === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        return new SuccessResultDO($sellerGoods);
    }

    /**
     * @param int $sellerId
     * @param string $barCode
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($sellerId = null,$barCode = null,$userId = null)
    {   
        $this->sellerId = $sellerId;
        $this->barCode = $barCode;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        