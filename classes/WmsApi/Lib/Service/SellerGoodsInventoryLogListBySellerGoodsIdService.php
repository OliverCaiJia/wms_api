<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\SellerGoodsInventoryLog;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class SellerGoodsInventoryLogListBySellerGoodsIdService extends ServiceBase
{       
    /**
     * @var int
     */
    protected $sellerGoodsId;

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
        $availableGoodsInventoryLogList = SellerGoodsInventoryLog::listBySellerGoodsId($this->sellerGoodsId);
        return new SuccessResultDO($availableGoodsInventoryLogList);
    }
    
    /**
     * @param int $availableGoodsId
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($availableGoodsId = null,$userId = null)
    {   
        $this->sellerGoodsId = $availableGoodsId;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        