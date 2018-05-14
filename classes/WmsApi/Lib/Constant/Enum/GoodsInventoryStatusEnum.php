<?php
/**
 * Created by PhpStorm.
 * User: baoal
 * Date: 2017/5/7
 * Time: 下午4:51
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class GoodsInventoryStatusEnum extends Enum
{
    const IN_STOCK  = 1;
    const PUTAWAY  = 2;
    const PICK      = 3;
    const OUT_STOCK = 4;
}