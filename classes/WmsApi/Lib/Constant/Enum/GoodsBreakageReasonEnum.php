<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 2017/6/29
 * Time: 下午2:53
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class GoodsBreakageReasonEnum extends Enum
{
    const OVERDUE = "overdue";
    const BREAKAGE = "breakage";
    const LOST = "lost";
}