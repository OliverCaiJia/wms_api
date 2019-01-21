<?php

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class UploadFilePathEnum extends Enum
{
    const FILES = ['csv','txt','doc','docs','pages','xml','xls','xlsx','pdf','conf','number','ppt','keynote'];
    const IMAGES = ['bmp','jpg','jpeg','png']; //'gif','tiff','eps','ai','raw'


}