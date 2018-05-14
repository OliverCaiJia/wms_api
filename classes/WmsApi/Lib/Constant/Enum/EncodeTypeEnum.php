<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/6/15
 * Time: 下午4:41
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class EncodeTypeEnum extends Enum
{
    const NUMBER = 1;
    const LOWERCASE = 2;
    const UPPERCACE = 3;
    const NUMBER_LOWERCASE = 4;
    const NUMBER_UPPERCASE = 5;
    const LOWERCASE_UPPERCACE = 6;
    const NUMBER_LOWERCASE_UPPERCACE = 7;
}