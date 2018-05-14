<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/14
 * Time: 下午2:36
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class BuiltinRoleEnum extends Enum
{
    const ANONYMOUS = 1;
    const OWNER = 2;
}