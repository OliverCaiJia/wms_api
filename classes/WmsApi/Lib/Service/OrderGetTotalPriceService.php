<?php
/**
 * Created by PhpStorm.
 * User: baoal
 * Date: 2017/4/21
 * Time: 下午5:13
 */

namespace WmsApi\Lib\Service;

use WmsApi\Lib\Model\Order;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;


class OrderGetTotalPriceService extends ServiceBase
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