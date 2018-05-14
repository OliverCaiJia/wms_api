<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/5/4
 * Time: 下午3:13
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class UseAttributeEnum extends Enum
{
    // 备货/拣选/残品/暂存/预包装/退货

    const STOCK         = 'stock';
    const PICK          = 'pick';
    const SCRAP         = 'scrap';
    const TEMPORARY     = 'temporary';
    const PREPACK       = 'prepack';
    const BACK          = 'back';
}