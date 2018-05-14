<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\SellerGoods;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;


class SellerGoodsUpdateImageService extends ServiceBase
{
    /**
     * @var SellerGoods
     */
    protected $newSellerGoods;

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
        $sellerGoods = SellerGoods::findUniqueByPKId($this->newSellerGoods->getId());
        if ($sellerGoods === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_NOT_EXISTS));
        }
        $sellerGoods->copyPropFrom($this->newSellerGoods);
        if (!$sellerGoods->update()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR, 
                "execute update sellerGoods error: " .
                $sellerGoods->getMessages() . "\t" . json_encode($sellerGoods));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO();
    }
        
    /**
     * @param SellerGoods $newSellerGoods
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain(SellerGoods $newSellerGoods = null, $userId = null)
    {
        $this->newSellerGoods = $newSellerGoods;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        