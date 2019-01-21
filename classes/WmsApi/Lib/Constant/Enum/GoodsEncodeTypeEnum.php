<?php

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class GoodsEncodeTypeEnum extends Enum
{
    const BAR = "bar";
    const UNIQUE = "unique";
    const RFID = 'rfid';



    /**
     * only unique type
     * @var array
     */
    static protected $uniqueEnumList = [
        self::UNIQUE,
        self::RFID
    ];

    /**
     * @return array
     */
    static public function getUniqueEnumList()
    {
        return self::$uniqueEnumList;
    }

}