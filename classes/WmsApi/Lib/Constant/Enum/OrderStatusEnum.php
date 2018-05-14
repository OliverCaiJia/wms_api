<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/17
 * Time: 上午11:21
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class OrderStatusEnum extends Enum
{
    const WAIT_VERIFY = 0;
    const SUCCESS_VERIFY = 1;
    const PART_SPLIT = 2;
    const SUCCESS_SPLIT = 3;
}