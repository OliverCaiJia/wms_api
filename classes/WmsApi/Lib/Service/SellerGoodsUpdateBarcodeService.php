<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\PickOrderGoods;
use WmsApi\Lib\Model\SellerGoods;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;


class SellerGoodsUpdateBarcodeService extends ServiceBase
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
    public function beforeExecute()
    {
        $sellerGoods = SellerGoods::findUniqueByPKId($this->newSellerGoods->getId());
        if ($sellerGoods === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        $isSellerGoods = SellerGoods::findUniqueByUK([
            'seller_id' =>$sellerGoods->getSellerId(),
            'bar_code' => $this->newSellerGoods->getBarCode()
        ]);
        if ($isSellerGoods !== null && $sellerGoods->getId() !== $isSellerGoods->getId()) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_BAR_CODE_ALREADY_EXISTS));
        }
        $pickOrderGoods = PickOrderGoods::findUniqueByUK(['seller_goods_id'=>$sellerGoods->getId()]);
        if ($pickOrderGoods !== null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::BAR_CODE_ALREADY_USED_CAN_NO_MODIFY));
        }
        return new SuccessResultDO();
    }


    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $sellerGoods = SellerGoods::findUniqueByPKId($this->newSellerGoods->getId());
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
        