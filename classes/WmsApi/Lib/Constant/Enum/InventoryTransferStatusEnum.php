<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/6/19
 * Time: 上午11:58
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class InventoryTransferStatusEnum extends Enum
{
    const WAIT_REQUEST = 0;
    const WAIT_APPROVAL = 1;
    const PASS_APPROVAL = 2;
    const COMPLETED = 3;
}