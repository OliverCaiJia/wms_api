<?php
namespace WmsApi\Lib\Service;

use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use WmsApi\Lib\Model\Order;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class OrderDetailService extends ServiceBase
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
        return $this->setRoleByOrderId($this->id);
    }
    
    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $order = Order::findUniqueByPKId($this->id);
        if ($order === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        return new SuccessResultDO($order);
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
        