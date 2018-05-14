<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 2017/6/26
 * Time: 下午4:18
 */

namespace WmsApi\Lib\Service;


use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;
use WmsApi\Lib\Constant\Enum\GoodsInventoryStatusEnum;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\GoodsEncode;
use WmsApi\Lib\Model\SellerGoods;

class SellerGoodsPutawayService extends ServiceBase
{
    /**
     * @var int
     */
    protected $sellerGoodsId;

    /**
     * @var string
     */
    protected $goodsCode;

    public function getRole()
    {
        return $this->setRoleByUserId();
    }

    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $sellerGoods = SellerGoods::findUniqueByPKIdForUpdate($this->sellerGoodsId);
        if ($sellerGoods === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        $goodsEncode = GoodsEncode::findUniqueByUKForUpdate([
            "goods_code" => $this->goodsCode
        ]);
        if ($goodsEncode === null || (int)$sellerGoods->getId() !== (int)$goodsEncode->getSellerGoodsId()) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::GOODS_CODE_NOT_EXISTS));
        }
        if ((int)$goodsEncode->getInventoryStatus() === GoodsInventoryStatusEnum::IN_STOCK) {
            $goodsEncode->setInventoryStatus(GoodsInventoryStatusEnum::PUTAWAY);

            $sellerGoods->setInventory($sellerGoods->getInventory() + 1);
            if (!$sellerGoods->update()) {
                LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                    "goods storage execute update sellerGoods error: " .
                    $sellerGoods->getMessages() . "\t" . json_encode($sellerGoods));
                return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
            }
        }
        if (!$goodsEncode->update()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "goods storage execute update goodsEncode error: " .
                $goodsEncode->getMessages() . "\t" . json_encode($goodsEncode));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO();
    }

    /**
     * @param int $sellerGoodsId
     * @param string $goodsCode
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($sellerGoodsId = null, $goodsCode = null, $userId = null)
    {
        $this->sellerGoodsId = $sellerGoodsId;
        $this->goodsCode = $goodsCode;
        $this->userId = $userId;
        return parent::executeChain();
    }
}