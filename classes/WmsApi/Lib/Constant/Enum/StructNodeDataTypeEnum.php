<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/5/4
 * Time: 上午11:27
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class StructNodeDataTypeEnum extends Enum
{
    const BOOL          = "BOOL";
    const BOOL_LIST     = "BOOL_LIST";
    const DOUBLE        = "DOUBLE";
    const DOUBLE_LIST   = "DOUBLE_LIST";
    const INT           = "INT";
    const INT_LIST      = "INT_LIST";
    const STRING        = "STRING";
    const STRING_LIST   = "STRING_LIST";
}