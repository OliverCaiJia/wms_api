<?php

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class ApiParamDataTypeEnum extends Enum
{
    const VARIABLE      = "VARIABLE";
    const STRUCT        = "STRUCT";
    const STRUCT_LIST   = "STRUCT_LIST";
    CONST MAP           = "MAP";
    CONST MAP_LIST      = "MAP_LIST";
}