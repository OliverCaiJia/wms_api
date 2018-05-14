<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/24
 * Time: 下午12:03
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class OrderImportRulesEnum extends Enum
{
    const ORDER_SN = 'order_sn';
    const CONSIGNEE_NAME = 'consignee_name';
    const CONSIGNEE_ADDRESS = 'consignee_address';
    const PHONE_NUMBER = 'phone_number';
    const COMMENT = 'comment';
    const BUYER_MESSAGE = 'buyer_message';
    const PAID_PRICE = 'paid_price';
}