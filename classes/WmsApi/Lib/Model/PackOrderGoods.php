<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class PackOrderGoods extends ModelBase
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $pack_order_id;

    /**
     *
     * @var integer
     */
    protected $seller_goods_id;

    /**
     *
     * @var string
     */
    protected $encode_type;

    /**
     *
     * @var string
     */
    protected $goods_encode;

    /**
     *
     * @var string
     */
    protected $pick_order_goods_id;

    /**
     *
     * @var int
     */
    protected $combo_id;

    /**
     *
     * @var string
     */
    protected $combo_encode;

    /**
     *
     * @var integer
     */
    protected $goods_number;

    /**
     *
     * @var integer
     */
    protected $scanned_number;

    /**
     * Method to set the value of field id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field pack_order_id
     *
     * @param integer $pack_order_id
     * @return $this
     */
    public function setPackOrderId($pack_order_id)
    {
        $this->pack_order_id = $pack_order_id;

        return $this;
    }

    /**
     * Method to set the value of field goods_id
     *
     * @param integer $seller_goods_id
     * @return $this
     */
    public function setSellerGoodsId($seller_goods_id)
    {
        $this->seller_goods_id = $seller_goods_id;

        return $this;
    }

    /**
     * Method to set the value of field encode_type
     *
     * @param string $encode_type
     * @return $this
     */
    public function setEncodeType($encode_type)
    {
        $this->encode_type = $encode_type;

        return $this;
    }

    /**
     * Method to set the value of field goods_encode
     *
     * @param string $goods_encode
     * @return $this
     */
    public function setGoodsEncode($goods_encode)
    {
        $this->goods_encode = $goods_encode;

        return $this;
    }

    /**
     * @param string $pick_order_goods_id
     * @return PackOrderGoods
     */
    public function setPickOrderGoodsId($pick_order_goods_id)
    {
        $this->pick_order_goods_id = $pick_order_goods_id;
        return $this;
    }

    /**
     * @param int $combo_id
     * @return PackOrderGoods
     */
    public function setComboId($combo_id)
    {
        $this->combo_id = $combo_id;
        return $this;
    }

    /**
     * @param string $combo_encode
     * @return PackOrderGoods
     */
    public function setComboEncode($combo_encode)
    {
        $this->combo_encode = $combo_encode;
        return $this;
    }

    /**
     * Method to set the value of field goods_number
     *
     * @param integer $goods_number
     * @return $this
     */
    public function setGoodsNumber($goods_number)
    {
        $this->goods_number = $goods_number;

        return $this;
    }

    /**
     * Method to set the value of field scanned_number
     *
     * @param integer $scanned_number
     * @return $this
     */
    public function setScannedNumber($scanned_number)
    {
        $this->scanned_number = $scanned_number;

        return $this;
    }

    /**
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field pack_order_id
     *
     * @return integer
     */
    public function getPackOrderId()
    {
        return $this->pack_order_id;
    }


    /**
     * Returns the value of field goods_id
     *
     * @return integer
     */
    public function getSellerGoodsId()
    {
        return $this->seller_goods_id;
    }

    /**
     * Returns the value of field encode_type
     *
     * @return string
     */
    public function getEncodeType()
    {
        return $this->encode_type;
    }

    /**
     * Returns the value of field goods_encode
     *
     * @return string
     */
    public function getGoodsEncode()
    {
        return $this->goods_encode;
    }

    /**
     * @return string
     */
    public function getPickOrderGoodsId()
    {
        return $this->pick_order_goods_id;
    }

    /**
     * @return int
     */
    public function getComboId()
    {
        return $this->combo_id;
    }

    /**
     * @return string
     */
    public function getComboEncode()
    {
        return $this->combo_encode;
    }

    /**
     * Returns the value of field goods_number
     *
     * @return integer
     */
    public function getGoodsNumber()
    {
        return $this->goods_number;
    }

    /**
     * Returns the value of field scanned_number
     *
     * @return integer
     */
    public function getScannedNumber()
    {
        return $this->scanned_number;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setConnectionService(ServiceName::DB_WMS);
    }

    const CACHE_KEY_RULE_LIST_ALL = "list_all";

    const CACHE_KEY_RULE_LIST_BY_PACK_ORDER_ID = "list_by_pack_order_id";
    const CACHE_KEY_RULE_LIST_BY_PICK_ORDER_GOODS_ID = "list_by_pick_order_goods_id";

    /**
     * @return array
     */
    protected static function getUniqueKeys()
    {
        return ["pack_order_id,seller_goods_id,pick_order_goods_id"];
    }

    /**
     * @return int
     */
    protected static function getUniqueKeyEncodeWay()
    {
        return parent::CACHE_KEY_ENCODE_BASE64;
    }
            
    /**
     * @return array
     */
    protected static function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_PACK_ORDER_ID => ['pack_order_id'],
            self::CACHE_KEY_RULE_LIST_BY_PICK_ORDER_GOODS_ID => ['pick_order_goods_id'],
        ];
    }
            
	/**
	 * @param int $packOrderId
	 * @return static[]
	 */
	public static function listByPackOrderId($packOrderId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("pack_order_id = :pack_order_id:");
		$do->setBind([
			"pack_order_id" => $packOrderId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_PACK_ORDER_ID);
		return parent::findUseDO($do);
	}

    /**
     * @param int $packOrderId
     * @param int $sellerGoodsId
     * @param int $scannedNumber
     * @return static
     */
    public static function getNotScanGoods($packOrderId, $sellerGoodsId , $scannedNumber = 0)
    {
        $do = new ModelQueryDO();
        $do->setConditions("pack_order_id = :pack_order_id: and seller_goods_id = :seller_goods_id: and scanned_number = :scanned_number:");
        $do->setBind([
            "pack_order_id" => $packOrderId,
            "seller_goods_id" => $sellerGoodsId,
            "scanned_number" => $scannedNumber
        ]);
        $do->setOrderBy("id DESC");
        return parent::findFirstUseDO($do);
    }

    /**
     * @param int $packOrderId
     * @param int $sellerGoodsId
     * @return static
     */
    public static function getOptimalScanGoods($packOrderId, $sellerGoodsId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("pack_order_id = :pack_order_id: and seller_goods_id = :seller_goods_id: and scanned_number < goods_number");
        $do->setBind([
            "pack_order_id" => $packOrderId,
            "seller_goods_id" => $sellerGoodsId,
        ]);
        $do->setOrderBy("combo_id ASC");
        return parent::findFirstUseDO($do);
    }

    /**
     * @param int $pickOrderGoodsId
     * @return static[]
     */
    public static function listByPickOrderGoodsId($pickOrderGoodsId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("pick_order_goods_id = :pick_order_goods_id:");
        $do->setBind([
            "pick_order_goods_id" => $pickOrderGoodsId,
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_PICK_ORDER_GOODS_ID);
        return parent::findUseDO($do);
    }

    /**
     * @return static[]
     */
    public static function listAll()
    {
        $do = new ModelQueryDO();
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_ALL);
        return parent::findUseDO($do);
    }
}
            