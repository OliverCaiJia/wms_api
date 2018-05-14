<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/22
 * Time: 上午9:48
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class InventoryLogTypeEnum extends Enum
{
    const INCREASE = "increase";
    const REDUCE = "reduce";
}