<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/16
 * Time: 下午10:33
 */

namespace WmsApi\Lib\Service;


use OK\PhalconEnhance\Util\LoggerUtil;
use OK\PhpEnhance\Constant\Enum\CommonErrorEnum;
use OK\PhpEnhance\DomainObject\FailureResultDO;
use OK\PhpEnhance\DomainObject\ServiceResultDO;
use OK\PhpEnhance\DomainObject\SuccessResultDO;
use Phalcon\Logger;
use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use WmsApi\Lib\Constant\Enum\WmsApiErrorEnum;
use WmsApi\Lib\Constant\ServiceName;
use WmsApi\Lib\Manager\AddressManager;
use WmsApi\Lib\Model\Order;
use WmsApi\Lib\Model\OrderGoods;
use WmsApi\Lib\Model\SellerGoods;

class OrderVerifyOrderService extends ServiceBase
{
    /**
     * @var int
     */
    protected $orderId;

    /**
     * @return ServiceResultDO
     */
    public function getRole()
    {
        return $this->setRoleByOrderId($this->orderId);
    }

    /**
     * @return ServiceResultDO
     */
    public function beforeExecute()
    {
        $order = Order::findUniqueByPKIdForUpdate($this->orderId);
        if ($order === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        if ((int)$order->getStatus() !== (int)OrderStatusEnum::WAIT_VERIFY) {
            return new FailureResultDO(new WmsApiErrorEnum(WmsApiErrorEnum::ORDER_STATUS_ERROR));
        }
        $addressManager = new AddressManager();
        return $addressManager->getUsableAddress($order->getProvince(),$order->getCity(),$order->getDistrict());
    }

    /**
     * @return ServiceResultDO
     */
    public function execute()
    {
        $order = Order::findUniqueByPKIdForUpdate($this->orderId);
        if ($order === null) {
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::ITEM_NOT_EXISTS));
        }
        $order->setStatus(OrderStatusEnum::SUCCESS_VERIFY);
        if (!$order->update()) {
            LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                "verify order execute update order error: " .
                $order->getMessages() . "\t" . json_encode($order));
            return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
        }
        $orderGoodsList = OrderGoods::listByOrderId($order->getId());
        foreach ($orderGoodsList as $orderGoods){
            $sellerGoods = SellerGoods::findUniqueByPKId($orderGoods->getSellerGoodsId());
            if ($sellerGoods->getIsCombo() && !$sellerGoods->getIsLocked()){
                $sellerGoods->setIsLocked(1);
                if (!$sellerGoods->update()) {
                    LoggerUtil::log(ServiceName::LOGGER_WMS_API, Logger::ERROR,
                        "update seller goods for combo is locked error: " .
                        $sellerGoods->getMessages() . "\t" . json_encode($sellerGoods));
                    return new FailureResultDO(new CommonErrorEnum(CommonErrorEnum::INTERNAL_SERVER_ERROR));
                }
            }
        }
        return new SuccessResultDO();
    }

    /**
     * @param int $orderId
     * @param int $userId
     * @return ServiceResultDO
     */
    public function executeChain($orderId = null, $userId = null)
    {
        $this->orderId = $orderId;
        $this->userId = $userId;
        return parent::executeChain();
    }


}