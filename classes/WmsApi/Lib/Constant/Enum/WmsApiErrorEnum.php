<?php

namespace WmsApi\Lib\Constant\Enum;

use OK\PhpEnhance\DataStructure\Enum;

class WmsApiErrorEnum extends Enum
{
    /* Address */
    const ADDRESS_CAN_NOT_BE_NONE = "address can not be none";
    const CITY_NOT_EXISTS = "city not exists";
    const FREIGHT_GROUP_ALREADY_EXISTS = "freight group already exists";

    /* api */
    const API_ALREADY_EXISTS = "api already exists";
    const API_PARAM_ALREADY_EXISTS = "api param already exists";
    const API_RETURN_DATA_ALREADY_EXISTS = "api return data already exists";
    const STRUCT_NODE_ALREADY_EXISTS = "struct node already exists";
    const STRUCT_ROOT_ALREADY_EXISTS = "struct root already exists";

    /* Container*/
    const CONTAINER_ALREADY_EXISTS = "container already exists";
    const CONTAINER_INVENTORY_SHORTAGE = "container inventory shortage";
    const CONTAINER_NOT_EXISTS = "container not exists";
    const CONTAINER_WEIGHT_ERROR_GRATER_THAN_ALLOW_ERROR = "container weight error greater than allow error";

    /* oods */
    const GOODS_ALREADY_EXISTS = "goods already exists";
    const GOODS_BLACKLIST_ALREADY_EXISTS = "goods blacklist already exists";
    const GOODS_BLACKLIST_NOT_EXISTS = "goods blacklist not exists";
    const GOODS_CODE_ALREADY_USED = "goods code already used";
    const GOODS_CODE_EXISTS_BUT_INVENTORY_STATUS_ERROR = "goods code exists but inventory status error";
    const GOODS_CODE_EXISTS_NOT_BELONG_TO_GOODS = "goods code exists but does not belong to the goods";
    const GOODS_CODE_EXISTS_NOT_BELONG_TO_SELLER = "goods code exists but does not belong to the seller";
    const GOODS_CODE_HAVE_REPORTED_LOSS = "goods code have reported loss";
    const GOODS_CODE_IS_DELETE = "goods code is delete";
    const GOODS_CODE_NOT_EXISTS = "goods code not exists";
    const GOODS_ENCODE_ALREADY_EXISTS = "goods encode already exists";
    const GOODS_ENCODE_NOT_EXISTS = "goods encode not exists";
    const GOODS_GROUP_NOT_EXISTS = "goods group not exists";
    const GOODS_GROUP_REF_ALREADY_EXISTS = "goods group ref already exists";
    const GOODS_GROUP_REF_NOT_EXISTS = "goods group ref not exists";
    const GOODS_HAVE_FINISHED_PACKING = "goods have finished packing";
    const GOODS_HAVE_FINISHED_PICKING = "goods have finished picking";
    const GOODS_INVENTORY_NOT_SOLD_OUT = "goods inventory not sold out";
    const GOODS_INVENTORY_SHORTAGE = "goods inventory shortage";
    const GOODS_INVENTORY_SHORTAGE_ADD_GOODS_FIRST = "goods inventory shortage add goods first";
    const GOODS_NOT_EXISTS = "goods not exists";
    const GOODS_NO_MORE_SCANNING = "goods not more scanning";
    const GOODS_NUMBER_EXCESSIVE = "goods number excessive";
    const GOODS_POST_INVENTORY_GT_1 = "goods post inventory greater then 1";
    const GOODS_PREPACK_WEIGHT_NOT_EXISTS = "goods prepack weight not exists";
    const GOODS_UNIQUE_CODE_ALREADY_EXISTS = "goods_unique_code already exists";
    const GOODS_WEIGHT_ERROR_GRATER_THAN_ALLOW_ERROR = "goods weight error greater than allow error";

    const IMAGES_FILE_TYPE_ERROR = "images file type error";
    const BARCODE_ALREADY_EXISTS = "barCode already exists";
    const BAR_CODE_ALREADY_USED_CAN_NO_MODIFY = "barCode already used can no modify";
    const BATCH_NUMBER_NOT_EXISTS = "batch number not exists";


    /* Inventory */
    const INVENTORY_TRANSFER_GOODS_ALREADY_EXISTS = "inventory transfer goods already exists";
    const INVENTORY_TRANSFER_GOODS_NOT_EXISTS = "inventory transfer goods not exists";
    const INVENTORY_TRANSFER_STATUS_ERROR = "inventory transfer status error";

    /* Logistic */
    const LOGISTIC_COMPANY_ALREADY_EXISTS = "logistic company already exists";
    const LOGISTIC_ORDER_ALREADY_EXISTS = "logistic order already exists";
    const LOGISTIC_ORDER_CONTAINER_NOT_EXISTS = "logistic order container not exists";
    const LOGISTIC_ORDER_GOODS_ALREADY_EXISTS = "logistic order goods already exists";
    const LOGISTIC_ORDER_GOODS_OVERWEIGHT = "logistic order goods overweight";
    const LOGISTIC_ORDER_GOODS_WEIGHT_ERROR_MUST_NOT_EXCEED_10G = "logistic order goods weight error must not exceed 10g";
    const LOGISTIC_ORDER_IS_NOT_EXPORT = "logistic order is not export";
    const LOGISTIC_ORDER_NOT_EXISTS = "logistic order not exists";
    const LOGISTIC_ORDER_PACK_STATUS_ERROR = "logistic order pack status error";
    const LOGISTIC_ORDER_PICK_STATUS_ERROR = "logistic order pick status error";
    const LOGISTIC_ORDER_STATUS_ERROR = "logistic order status error";
    const LOGISTIC_REQUIRE_NOT_EXISTS = "logistic require no exists";

    const GET_LOGISTIC_CODE_ERROR = "get logistic code error";
    const EXPRESS_SN_ALREADY_EXISTS = "express sn already exists";
    const EXPRESS_SN_NOT_EXISTS = "express sn not exists";

    /* Member,member role and passport*/
    const MEMBER_ALREADY_EXISTS = "member already exists";
    const MEMBER_DISABLED = "member disabled";
    const MEMBER_NOT_EXISTS = "member not exists";
    const MEMBER_ROLE_ALREADY_EXISTS = "member role already exists";
    const MEMBER_ROLE_NOT_EXISTS = "member role not exists";

    const ORIGINAL_PASSWORD_ERROR = "original password error";
    const PASSWORD_NOT_MATCHES = "password not matches";
    const PAY_MODE_NOT_SUPPORT_INVENTORY_UPDATE = "pay mode no support inventory update";
    const UPDATE_PASSWORD_ERROR = "update password error";

    const ROLE_ACL_ALREADY_EXISTS = "role acl already exists";
    const ROLE_ALREADY_EXISTS = "role already exists";
    const MODULE_ACTION_ALREADY_EXISTS = "module action already exists";

    /* Order */
    const ORDER_ALREADY_EXISTS = "order already exists";
    const ORDER_GOODS_ALREADY_EXISTS = "order goods already exists";
    const ORDER_GOODS_IS_ALREADY_SPLIT = "order goods is already split";
    const ORDER_GOODS_NOT_EXISTS = "order goods not exists";
    const ORDER_NOT_EXISTS = "order not exists";
    const ORDER_NOT_SPLIT_STATUS = "order can not split status";
    const ORDER_NO_VERIFY_SUCCESS = "order no verify success";
    const ORDER_STATUS_ERROR = "order status error";
    const ORDER_TOTAL_PRICE_GT_PAID_PRICE = "total price greater than paid price";
    const CREATE_DELIVERY_ORDER_ERROR = "create delivery order error";


    /*Pick and Pack*/
    const PACKAGE_WEIGHT_MUST_BE_GREATER_THAN_ALL_GOODS_WEIGHT = "package weight must be greater than all goods weight";
    const PACK_ORDER_GOODS_NOT_EXISTS = "pack order goods not exists";
    const PACK_ORDER_NOT_EXISTS = "pack order not exists";
    const PACK_ORDER_PACK_STATUS_ERROR = "pack order pack status error";
    const PACK_ORDER_PICK_STATUS_ERROR = "pack order pick status error";

    const PICK_ORDER_ALREADY_PICK_CAN_NOT_WITHDRAW = "pick order already pick can not withdraw";
    const PICK_ORDER_GOODS_NOT_EXISTS = "pick order goods not exists";
    const PICK_ORDER_HAS_NOT_BEEN_GENERATED = "pick order has not been generated";
    const PICK_ORDER_NOT_EXISTS = "pick order not exists";
    const PICK_ORDER_NOT_WAIT_PICK_STATUS = "pick order not wait pick status";
    const PICK_ORDER_PICK_STATUS_ERROR = "pick order pick status error";

    /* platform order*/
    const PLATFORM_ORDER_UPLOAD_ALREADY_EXISTS = "platform order upload already exists";
    const PLATFORM_ORDER_UPLOAD_NOT_EXISTS = "platform order upload not exists";
    const PLATFORM_SOURCE_ALREADY_EXISTS = "platform source already exists";

    /* Provider */
    const PROVIDER_ALREADY_EXISTS = "provider already exists";
    const PROVIDER_API_ALREADY_EXISTS = "provider api already exists";
    const PROVINCE_NOT_EXISTS = "province not exists";

    const SCANNING_GOODS_NUMBER_ERROR = "scanning goods number error";

    /* Seller and  seller goods */
    const SELLER_ALREADY_EXISTS = "seller already exists";
    const SELLER_AVAILABLE_CONTAINER_ALREADY_EXISTS = "seller available container already exists";
    const SELLER_AVAILABLE_CONTAINER_NOT_EXISTS = "seller available container not exists";

    const SELLER_COMBO_GOODS_ALREADY_EXISTS = "seller combo goods already exists";
    const SELLER_COMBO_GOODS_IS_LOCKED = "seller combo goods is locked";
    const SELLER_COMBO_GOODS_NOT_EXISTS = "seller combo goods not exists";
    const SELLER_CREDIT_LINE_OVERDRAFT = "seller credit line overdraft";
    const SELLER_FREIGHT_GROUP_ALREADY_EXISTS = "seller freight group already exists";
    const SELLER_GOODS_ABBR_NAME_ALREADY_EXISTS = "seller goods abbr name already exists";
    const SELLER_GOODS_ALREADY_EXISTS = "seller goods already exists";
    const SELLER_GOODS_BAR_CODE_ALREADY_EXISTS = "seller goods bar code already exists";
    const SELLER_GOODS_INVENTORY_SHORTAGE = "seller goods inventory shortage";
    const SELLER_GOODS_IS_NOT_A_COMBO = "seller goods is not a combo";
    const SELLER_GOODS_NAME_ALREADY_EXISTS = "seller goods name already exists";
    const SELLER_GOODS_NOT_EXISTS = "seller goods not exists";

    const SELLER_NOT_EXISTS = "seller not exists";
    const SELLER_NOT_HAS_LOGISTIC_COMPANY = "seller not has logistic company";
    const SELLER_LOGISTIC_COMPANY_NOT_MATCH = "seller logistic company not match";

    /*Seller platform*/
    const SELLER_PLATFORM_GOODS_ALREADY_EXISTS = "seller platform goods already exists";
    const SELLER_PLATFORM_GOODS_NOT_EXISTS = "seller platform goods not exists";
    const SELLER_PLATFORM_SOURCE_ALREADY_EXISTS = "seller platform source already exists";
    const SELLER_PLATFORM_SOURCE_NOT_EXISTS = "seller platform source not exists";

    /* Upload */
    const DISTRICT_NOT_EXISTS = "district not exists";
    const FILE_NOT_EXISTS = "file not exists";
    const FILE_TYPE_ERROR = "file type error,must be CSV";
    const UPLOAD_FILE_ERROR = "upload file error";
    const MKDIR_ERROR = "no permission to create directory";

    /* warehouse */
    const REPOSITORY_ALREADY_EXISTS = "repository already exists";
    const WAREHOUSE_ALREADY_EXISTS = "warehouse already exists";
    const LOCATION_ALREADY_EXISTS = "location already exists";
}
            