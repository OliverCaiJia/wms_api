<?php

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class GoodsBreakageReasonEnum extends Enum
{
    const OVERDUE = "overdue";
    const BREAKAGE = "breakage";
    const LOST = "lost";
}