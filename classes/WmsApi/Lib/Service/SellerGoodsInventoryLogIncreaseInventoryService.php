<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/22
 * Time: 上午9:32
 */

namespace WmsApi\Lib\Service;


use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;
use WmsApi\Lib\Constant\Enum\GoodsEncodeTypeEnum;
use WmsApi\Lib\Constant\Enum\GoodsInventoryStatusEnum;
use WmsApi\Lib\Constant\Enum\InventoryLogTypeEnum;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Manager\EncodeGenerateManager;
use WmsApi\Lib\Model\SellerComboGoods;
use WmsApi\Lib\Model\SellerGoodsInventoryLog;
use WmsApi\Lib\Model\GoodsEncode;
use WmsApi\Lib\Model\SellerGoods;

class SellerGoodsInventoryLogIncreaseInventoryService extends ServiceBase
{
    /**
     * @var SellerGoodsInventoryLog
     */
    protected $sellerGoodsInventoryLog;

    /**
     * @var string $batchNumber
     */
    protected $batchNumber;

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
        //set inventory snapshot
        $this->sellerGoodsInventoryLog->setInventorySnapshot($sellerGoods->getInventory());
        $number = $this->sellerGoodsInventoryLog->getNumber();
        // update sellerGoods
        $sellerGoods->setInventory((int)$sellerGoods->getInventory() + (int)$number);
        if (!$sellerGoods->update()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "increase quantity execute update goods inventory error: " .
                $sellerGoods->getMessages() . "\t" . json_encode($sellerGoods));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }

        if (in_array($sellerGoods->getEncodeType(),GoodsEncodeTypeEnum::getUniqueEnumList(),true))
        {
            while ($number > 0){
                $goodsEncode = new GoodsEncode();
                $goodsEncode->setSellerGoodsId($sellerGoods->getId());
                $goodsEncode->setInventoryStatus(GoodsInventoryStatusEnum::IN_STOCK);
                $goodsEncode->setBatchNumber($this->batchNumber);
                $goodsEncode->setIsLoss(0);
                $goodsEncode->setIsPrinted(0);
                $goodsEncode->setGoodsCode(EncodeGenerateManager::getGoodsCode($sellerGoods));
                if (!$goodsEncode->create()) {
                    LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                        "create goods encode error: " .
                        $goodsEncode->getMessages() . "\t" . json_encode($goodsEncode));
                    return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
                }
                $number--;
            }
        } else {
            $sellerComboGoodsList = SellerComboGoods::listByComboId($sellerGoods->getId());
            foreach ($sellerComboGoodsList as $sellerComboGoods){
                $newSellerGoods = SellerGoods::findUniqueByPKId($sellerComboGoods->getSellerGoodsId());
                if ((string)$newSellerGoods->getEncodeType() === GoodsEncodeTypeEnum::BAR) {
                    $reduceGoodsNumber = bcmul($sellerComboGoods->getGoodsNumber(),(int)$number);

                    $newSellerGoodsInventoryLog = new SellerGoodsInventoryLog();
                    $newSellerGoodsInventoryLog->setMemberId($this->userId);
                    $newSellerGoodsInventoryLog->setSellerGoodsId($newSellerGoods->getId());
                    $newSellerGoodsInventoryLog->setType(InventoryLogTypeEnum::REDUCE);
                    $newSellerGoodsInventoryLog->setNumber($reduceGoodsNumber);
                    $newSellerGoodsInventoryLog->setInventorySnapshot($newSellerGoods->getInventory());
                    $newSellerGoodsInventoryLog->setReason("add to combo");
                    if (!$newSellerGoodsInventoryLog->create()) {
                        LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                            "execute add goods inventory log error: " .
                            $newSellerGoodsInventoryLog->getMessages() . "\t" . json_encode($newSellerGoodsInventoryLog));
                        return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
                    }

                    $newSellerGoods->setInventory($newSellerGoods->getInventory() - $reduceGoodsNumber);
                    if (!$newSellerGoods->update()) {
                        LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                            "reduce combo seller goods id  inventory error: " .
                            $newSellerGoods->getMessages() . "\t" . json_encode($newSellerGoods));
                        return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
                    }
                }
            }
        }
        $this->sellerGoodsInventoryLog->setMemberId($this->userId);
        $this->sellerGoodsInventoryLog->setType(InventoryLogTypeEnum::INCREASE);
        if (!$this->sellerGoodsInventoryLog->create()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "execute add goods inventory log error: " .
                $this->sellerGoodsInventoryLog->getMessages() . "\t" . json_encode($this->sellerGoodsInventoryLog));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO($this->sellerGoodsInventoryLog);
    }

    /**
     * @param SellerGoodsInventoryLog $availableGoodsInventoryLog
     * @param string $batchNumber
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain(SellerGoodsInventoryLog $availableGoodsInventoryLog = null, $batchNumber = null, $userId = null)
    {
        $this->sellerGoodsInventoryLog = $availableGoodsInventoryLog;
        $this->batchNumber = $batchNumber;
        $this->userId = $userId;
        return parent::executeChain();
    }
}