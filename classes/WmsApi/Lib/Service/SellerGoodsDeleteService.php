<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\SellerPlatformGoods;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;


class SellerGoodsDeleteService extends ServiceBase
{       
    /**
     * @var int
     */
    protected $id;
            
    /**
     * @return ServiceResultDO
     */
    public function getRole()
    {
        return $this->setRoleBySellerGoodsId($this->id);
    }
        
    /**
     * @return ServiceResultDO
     */
    public function execute()
    {   
        $sellerGoods = SellerPlatformGoods::findUniqueByPKId($this->id);
        if ($sellerGoods === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        if (!$sellerGoods->delete()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "execute delete sellerGoods error: " .
                $sellerGoods->getMessages() . "\t" . json_encode($sellerGoods));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO();
    }

    /**
     * @param int $id
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($id = null,$userId = null)
    {   
        $this->id = $id;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        