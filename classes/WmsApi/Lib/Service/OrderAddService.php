<?php
namespace WmsApi\Lib\Service;

use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Model\Member;
use WmsApi\Lib\Model\Order;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;
use WmsApi\Lib\Model\Seller;


class OrderAddService extends ServiceBase
{
    /**
     * @var Order
     */
    protected $order;

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
    public function beforeExecute()
    {
        $member = Member::findUniqueByPKId($this->userId);
        if (!$member->getSellerId()){
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_NOT_EXISTS));
        }
        $seller = Seller::findUniqueByPKId($member->getSellerId());
        if ($seller === null){
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::SELLER_NOT_EXISTS));
        }
        $this->order->setSellerId($member->getSellerId());

        if($this->order->getPaidPrice() < $this->order->getTotalPrice()){
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_TOTAL_PRICE_GT_PAID_PRICE));
        }
        return new SuccessResultDO();
    }

    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $isOrder = Order::findUniqueByUK([
            "platform_source_id" => $this->order->getPlatformSourceId(),
            "order_sn" => $this->order->getOrderSn()
        ]);
        if ($isOrder !== null) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_ALREADY_EXISTS));
        }
        $this->order->setStatus(OrderStatusEnum::WAIT_VERIFY);
        if (!$this->order->create()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "execute add order error: " .
                $this->order->getMessages() . "\t" . json_encode($this->order));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        return new SuccessResultDO($this->order->getId());
    }
        
    /**
     * @param Order $order
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain(Order $order = null, $userId = null)
    {
        $this->order = $order;
        $this->userId = $userId;
        return parent::executeChain();
    }
}
        