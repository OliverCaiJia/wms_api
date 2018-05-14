<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\SellerGoods;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;


class SellerGoodsAddService extends ServiceBase
{
    /**
     * @var SellerGoods
     */
    protected $sellerGoods;

    /**
     * @return ServiceResultDO
     */
    public function getRole()
    {
        return $this->setRoleBySellerId($this->sellerGoods->getSellerId());
    }

    public function beforeExecute()
    {
        $isSellerGoods = SellerGoods::findUniqueByUK([
            "bar_code" => $this->sellerGoods->getBarCode(),
            "seller_id" => $this->sellerGoods->getSellerId(),
        ]);
        if ($isSellerGoods !== null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_BAR_CODE_ALREADY_EXISTS));
        }
        $isSellerGoods = SellerGoods::findUniqueByUK([
            "seller_id" => $this->sellerGoods->getSellerId(),
            "name" => $this->sellerGoods->getName(),
        ]);
        if ($isSellerGoods !== null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_NAME_ALREADY_EXISTS));
        }
        $isSellerGoods = SellerGoods::findUniqueByUK([
            "seller_id" => $this->sellerGoods->getSellerId(),
            "abbr_name" => $this->sellerGoods->getAbbrName(),
        ]);
        if ($isSellerGoods !== null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_ABBR_NAME_ALREADY_EXISTS));
        }
        return new SuccessResultDO();
    }

    /**
     * @return ServiceResultDO
     */
    public function execute()
    {   
        if (!$this->sellerGoods->create()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "execute add sellerGoods error: " .
                $this->sellerGoods->getMessages() . "\t" . json_encode($this->sellerGoods));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO($this->sellerGoods->getId());
    }
        
    /**
     * @param SellerGoods $sellerGoods
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain(SellerGoods $sellerGoods = null, $userId = null)
    {
        $this->sellerGoods = $sellerGoods;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        