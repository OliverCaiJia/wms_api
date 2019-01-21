<?php

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class GoodsBreakageLogStatusEnum extends Enum
{
    const WAIT_APPROVAL = 1;
    const REJECT_APPROVAL = 2;
    const PASS_APPROVAL = 3;
}