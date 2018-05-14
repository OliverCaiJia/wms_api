<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;


class OrderStatusEnumListAllService extends ServiceBase
{

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
        return new SuccessResultDO(OrderStatusEnum::values());
    }

    /**
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($userId = null)
    {
        $this->userId = $userId;
        return parent::executeChain();
    }
}
