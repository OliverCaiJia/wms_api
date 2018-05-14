<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/14
 * Time: 下午2:36
 */

namespace WmsApi\Lib\Constant\Enum;


use OK\PhpEnhance\DataStructure\Enum;

class UploadFilePathEnum extends Enum
{
    const FILES = ['csv','txt','doc','docs','pages','xml','xls','xlsx','pdf','conf','number','ppt','keynote'];
    const IMAGES = ['bmp','jpg','jpeg','png']; //'gif','tiff','eps','ai','raw'


}