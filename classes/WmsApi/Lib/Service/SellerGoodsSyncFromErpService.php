<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;
use WmsApi\Lib\Model\SellerGoods;


class SellerGoodsSyncFromErpService extends ServiceBase
{
    /**
     * @var SellerGoods
     */
    protected $sellerGoods;

    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $sellerGoods = SellerGoods::findUniqueByUK([
                'erp_goods_id' => $this->sellerGoods->getErpGoodsId()
        ]);
        if ($sellerGoods !== null) {
            return new SuccessResultDO();
        }
        $newSellerGoods = new SellerGoods();
        $newSellerGoods->copyPropFrom($this->sellerGoods);
        if (!$newSellerGoods->save()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "execute add sellerGoods error: " .
                $sellerGoods->getMessages() . "\t" . json_encode($sellerGoods));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO();
    }

    /**
     * @param SellerGoods $sellerGoods
     * @return ServiceResultDO
     */
    public function executeChain($sellerGoods = null)
    {
        $this->sellerGoods = $sellerGoods;
        return parent::executeChain();
    }
 }
        