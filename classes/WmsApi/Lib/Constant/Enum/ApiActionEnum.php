<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/5/4
 * Time: 下午3:13
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class ApiActionEnum extends Enum
{
    const CREATE = "create";
    const UPDATE = "update";
    const DELETE = "delete";
    const QUERY = "query";
}