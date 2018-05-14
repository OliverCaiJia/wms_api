<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/22
 * Time: 上午10:17
 */

namespace WmsApi\Lib\Service;


use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;
use WmsApi\Lib\Constant\Enum\GoodsEncodeTypeEnum;
use WmsApi\Lib\Constant\Enum\InventoryLogTypeEnum;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\SellerGoodsInventoryLog;
use WmsApi\Lib\Model\SellerGoods;

class SellerGoodsInventoryLogReduceInventoryService extends ServiceBase
{
    /**
     * @var SellerGoodsInventoryLog
     */
    protected $sellerGoodsInventoryLog;

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
        $sellerGoods = SellerGoods::findUniqueByPKId($this->sellerGoodsInventoryLog->getSellerGoodsId());
        if ($sellerGoods === null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_NOT_EXISTS));
        }
        if ($sellerGoods->getEncodeType() !== GoodsEncodeTypeEnum::BAR) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::FORBIDDEN));
        }
        if ((bool)$sellerGoods->getIsCombo()) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::FORBIDDEN));
        }

        if ((int)$sellerGoods->getInventory() < (int)$this->sellerGoodsInventoryLog->getNumber()) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_GOODS_INVENTORY_SHORTAGE));
        }
        //set inventory snapshot
        $this->sellerGoodsInventoryLog->setInventorySnapshot($sellerGoods->getInventory());
        // update sellerAvailableGoods
        $sellerGoods->setInventory((int)$sellerGoods->getInventory() - (int)$this->sellerGoodsInventoryLog->getNumber());
        if (!$sellerGoods->update()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "reduces inventory execute update goods inventory error: " .
                $sellerGoods->getMessages() . "\t" . json_encode($sellerGoods));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        $this->sellerGoodsInventoryLog->setMemberId($this->userId);
        $this->sellerGoodsInventoryLog->setType(InventoryLogTypeEnum::REDUCE);
        if (!$this->sellerGoodsInventoryLog->create()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "execute add goods inventory log error: " .
                $this->sellerGoodsInventoryLog->getMessages() . "\t" . json_encode($this->sellerGoodsInventoryLog));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO($this->sellerGoodsInventoryLog);
    }

    /**
     * @param SellerGoodsInventoryLog $sellerGoodsInventoryLog
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain(SellerGoodsInventoryLog $sellerGoodsInventoryLog = null, $userId = null)
    {
        $this->sellerGoodsInventoryLog = $sellerGoodsInventoryLog;
        $this->userId = $userId;
        return parent::executeChain();
    }
}