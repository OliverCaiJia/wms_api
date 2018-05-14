<?php
namespace WmsApi\Lib\Service;

use OK\PhalconEnhance\Util\QueueUtil;
use WmsApi\Lib\Constant\Enum\UploadStatusEnum;
use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Constant\TubeName;
use WmsApi\Lib\Model\SellerGoods;
use WmsApi\Lib\Model\SellerGoodsUpload;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;


class SellerGoodsUploadAddService extends ServiceBase
{
    /**
     * @var SellerGoodsUpload
     */
    protected $sellerGoodsUpload;

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
        $this->sellerGoodsUpload->setStatus(UploadStatusEnum::WAIT);
        $this->sellerGoodsUpload->setMemberId($this->userId);
        if (!$this->sellerGoodsUpload->create()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "execute add sellerGoodsUpload error: " .
                $this->sellerGoodsUpload->getMessages() . "\t" . json_encode($this->sellerGoodsUpload));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        $sellerGoodsList = SellerGoods::listBySellerId($this->sellerGoodsUpload->getSellerId());
        return new SuccessResultDO($sellerGoodsList);
    }

    /**
     * @return ServiceResultDO
     */
    public function afterExecute()
    {
        QueueUtil::fireEventQueue(ServiceName::MQ_WMS, TubeName::CREATE_SELLER_GOODS,
            $this->sellerGoodsUpload->getId());
        return new SuccessResultDO();
    }
        
    /**
     * @param SellerGoodsUpload $sellerGoodsUpload
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain(SellerGoodsUpload $sellerGoodsUpload = null, $userId = null)
    {
        $this->sellerGoodsUpload = $sellerGoodsUpload;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        