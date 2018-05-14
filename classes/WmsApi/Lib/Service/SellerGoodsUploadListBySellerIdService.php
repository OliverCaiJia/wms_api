<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\SellerGoodsUpload;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;


class SellerGoodsUploadListBySellerIdService extends ServiceBase
{       
    /**
     * @var int
     */
    protected $sellerId;
            
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
        $sellerGoodsUploadList = SellerGoodsUpload::listBySellerId($this->sellerId);
        return new SuccessResultDO($sellerGoodsUploadList);
    }
    
    /**
     * @param int $sellerId
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($sellerId = null,$userId = null)
    {   
        $this->sellerId = $sellerId;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        