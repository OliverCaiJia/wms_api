<?php

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class LogisticRequireEnum extends Enum
{
    const SHAKE_PROOF = 'shake_proof';
    const LEAKAGE_PROOF = 'leakage_proof';
    const DAMP_PROOF = 'damp_proof';
    const FIRE_PROOF = 'fire_proof';
    const FRAGILE =  'fragile';
    const PUT_ICE_BAG = 'put_ice_bag';
}