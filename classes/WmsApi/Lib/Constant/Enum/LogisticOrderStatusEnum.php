<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/17
 * Time: 上午11:37
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class LogisticOrderStatusEnum extends Enum
{
    const WAIT_PICK = 1;
    const WAIT_PACK = 2;
    const WAIT_DELIVERY = 3;
}