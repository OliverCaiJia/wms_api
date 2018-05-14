<?php
/**
 * Created by PhpStorm.
 * User: baoal
 * Date: 2017/5/7
 * Time: 下午4:51
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class ScanTypeEnum extends Enum
{
    const PICK = 'pick';
    const PACK = 'pack';
}