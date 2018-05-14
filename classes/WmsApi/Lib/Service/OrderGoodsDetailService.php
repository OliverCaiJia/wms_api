<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\OrderGoods;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class OrderGoodsDetailService extends ServiceBase
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
        return $this->setRoleByOrderGoodsId($this->id);
    }
        
    /**
     * @return ServiceResultDO
     */
    public function execute()
    {   
        $orderGoods = OrderGoods::findUniqueByPKId($this->id);
        if ($orderGoods === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        return new SuccessResultDO($orderGoods);
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
        