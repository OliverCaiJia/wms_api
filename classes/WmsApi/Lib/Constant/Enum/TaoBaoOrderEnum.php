<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/24
 * Time: 下午12:03
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class TaoBaoOrderEnum extends Enum
{
    const ORDER_SN = 9;
    const CONSIGNEE_NAME = 4;
    const CONSIGNEE_ADDRESS = 3;
    const PHONE_NUMBER = 7;
    const COMMENT = 11;
    const BUYER_MESSAGE = 13;
    const PAID_PRICE = 17;
}