<?php

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class ApiActionEnum extends Enum
{
    const CREATE = "create";
    const UPDATE = "update";
    const DELETE = "delete";
    const QUERY = "query";
}