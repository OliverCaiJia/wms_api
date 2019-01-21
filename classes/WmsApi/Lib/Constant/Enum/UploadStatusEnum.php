<?php

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class UploadStatusEnum extends Enum
{
    const WAIT = 0;
    const SUCCESS = 1;
    const FAIL = 2;
}