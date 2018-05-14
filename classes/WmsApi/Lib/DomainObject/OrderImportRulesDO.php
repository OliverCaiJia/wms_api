<?php

/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/5/3
 * Time: 下午4:25
 */

namespace WmsApi\Lib\DomainObject;


use OK\Util\ObjectUtil;

class OrderImportRulesDO
{

    /**
     * @var string
     */
    public $order_sn;

    /**
     * @var string
     */
    public $consignee_name;

    /**
     * @var string
     */
    public $consignee_address;

    /**
     * @var string
     */
    public $phone_number;

    /**
     * @var string
     */
    public $comment;

    /**
     * @var string
     */
    public $buyer_message;

    /**
     * @var string
     */
    public $paid_price;

    /**
     * @return string
     */
    public function getOrderSn()
    {
        return $this->order_sn;
    }

    /**
     * @param string $order_sn
     * @return OrderImportRulesDO
     */
    public function setOrderSn($order_sn)
    {
        $this->order_sn = $order_sn;
        return $this;
    }

    /**
     * @return string
     */
    public function getConsigneeName()
    {
        return $this->consignee_name;
    }

    /**
     * @param string $consignee_name
     * @return OrderImportRulesDO
     */
    public function setConsigneeName($consignee_name)
    {
        $this->consignee_name = $consignee_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getConsigneeAddress()
    {
        return $this->consignee_address;
    }

    /**
     * @param string $consignee_address
     * @return OrderImportRulesDO
     */
    public function setConsigneeAddress($consignee_address)
    {
        $this->consignee_address = $consignee_address;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param string $phone_number
     * @return OrderImportRulesDO
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return OrderImportRulesDO
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return string
     */
    public function getBuyerMessage()
    {
        return $this->buyer_message;
    }

    /**
     * @param string $buyer_message
     * @return OrderImportRulesDO
     */
    public function setBuyerMessage($buyer_message)
    {
        $this->buyer_message = $buyer_message;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaidPrice()
    {
        return $this->paid_price;
    }

    /**
     * @param string $paid_price
     * @return OrderImportRulesDO
     */
    public function setPaidPrice($paid_price)
    {
        $this->paid_price = $paid_price;
        return $this;
    }

    /**
     * OrderImportRulesDO constructor.
     * @param array $importRules
     */
    public function __construct($importRules)
    {
        foreach ($importRules as $key =>$rule) {
            ObjectUtil::setObjPropDyn($this, $key, $rule);
        }
    }
}