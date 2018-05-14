<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use WmsApi\Lib\Model\SellerGoods;


class SellerGoodsDetailByGoodsEncodeAndPackOrderIdService extends ServiceBase
{
    /**
     * @var int
     */
    protected $packOrderId;

    /**
     * @var string
     */
    protected $goodsEncode;


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
        $sellerGoods = SellerGoods::findUniqueByUK(['bar_code'=>$this->goodsEncode]);
        if ($sellerGoods === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_NOT_EXISTS));
        }
        return new SuccessResultDO($sellerGoods);
    }

    /**
     * @param int $packOrderId
     * @param string $goodsEncode
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($packOrderId = null, $goodsEncode = null, $userId = null)
    {
        $this->packOrderId = $packOrderId;
        $this->goodsEncode = $goodsEncode;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        