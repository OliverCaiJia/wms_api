<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class SellerGoods extends ModelBase
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $seller_id;

    /**
     *
     * @var string
     */
    protected $bar_code;

    /**
     *
     * @var string
     */
    protected $encode_type;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $abbr_name;

    /**
     *
     * @var integer
     */
    protected $is_combo;

    /**
     *
     * @var integer
     */
    protected $length;

    /**
     *
     * @var integer
     */
    protected $width;

    /**
     *
     * @var integer
     */
    protected $height;

    /**
     *
     * @var double
     */
    protected $weight;

    /**
     *
     * @var double
     */
    protected $prepack_weight;

    /**
     *
     * @var string
     */
    protected $logistic_require;

    /**
     *
     * @var string
     */
    protected $image;

    /**
     *
     * @var double
     */
    protected $price;

    /**
     *
     * @var integer
     */
    protected $inventory;

    /**
     *
     * @var string
     */
    protected $shelf_location;

    /**
     *
     * @var integer
     */
    protected $is_locked;

    /**
     *
     * @var string
     */
    protected $created;

    /**
     *
     * @var string
     */
    protected $modified;

    /**
     *
     * @var int
     */
    protected $erp_goods_id;

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
     * Method to set the value of field seller_id
     *
     * @param integer $seller_id
     * @return $this
     */
    public function setSellerId($seller_id)
    {
        $this->seller_id = $seller_id;

        return $this;
    }

    /**
     * Method to set the value of field bar_code
     *
     * @param string $bar_code
     * @return $this
     */
    public function setBarCode($bar_code)
    {
        $this->bar_code = $bar_code;

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
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field abbr_name
     *
     * @param string $abbr_name
     * @return $this
     */
    public function setAbbrName($abbr_name)
    {
        $this->abbr_name = $abbr_name;

        return $this;
    }

    /**
     * Method to set the value of field is_combo
     *
     * @param integer $is_combo
     * @return $this
     */
    public function setIsCombo($is_combo)
    {
        $this->is_combo = $is_combo;

        return $this;
    }

    /**
     * Method to set the value of field length
     *
     * @param integer $length
     * @return $this
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Method to set the value of field width
     *
     * @param integer $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Method to set the value of field height
     *
     * @param integer $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Method to set the value of field weight
     *
     * @param double $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Method to set the value of field prepack_weight
     *
     * @param double $prepack_weight
     * @return $this
     */
    public function setPrepackWeight($prepack_weight)
    {
        $this->prepack_weight = $prepack_weight;

        return $this;
    }

    /**
     * Method to set the value of field logistic_require
     *
     * @param string $logistic_require
     * @return $this
     */
    public function setLogisticRequire($logistic_require)
    {
        $this->logistic_require = $logistic_require;

        return $this;
    }

    /**
     * Method to set the value of field image
     *
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Method to set the value of field price
     *
     * @param double $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Method to set the value of field inventory
     *
     * @param integer $inventory
     * @return $this
     */
    public function setInventory($inventory)
    {
        $this->inventory = $inventory;

        return $this;
    }

    /**
     * Method to set the value of field shelf_location
     *
     * @param string $shelf_location
     * @return $this
     */
    public function setShelfLocation($shelf_location)
    {
        $this->shelf_location = $shelf_location;

        return $this;
    }

    /**
     * @param integer $is_locked
     * @return SellerGoods
     */
    public function setIsLocked($is_locked)
    {
        $this->is_locked = $is_locked;
        return $this;
    }

    /**
     * Method to set the value of field created
     *
     * @param string $created
     * @return $this
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Method to set the value of field modified
     *
     * @param string $modified
     * @return $this
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

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
     * Returns the value of field seller_id
     *
     * @return integer
     */
    public function getSellerId()
    {
        return $this->seller_id;
    }

    /**
     * Returns the value of field bar_code
     *
     * @return string
     */
    public function getBarCode()
    {
        return $this->bar_code;
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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field abbr_name
     *
     * @return string
     */
    public function getAbbrName()
    {
        return $this->abbr_name;
    }

    /**
     * Returns the value of field is_combo
     *
     * @return integer
     */
    public function getIsCombo()
    {
        return $this->is_combo;
    }

    /**
     * Returns the value of field length
     *
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Returns the value of field width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Returns the value of field height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Returns the value of field weight
     *
     * @return double
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Returns the value of field prepack_weight
     *
     * @return double
     */
    public function getPrepackWeight()
    {
        return $this->prepack_weight;
    }

    /**
     * Returns the value of field logistic_require
     *
     * @return string
     */
    public function getLogisticRequire()
    {
        return $this->logistic_require;
    }

    /**
     * Returns the value of field image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Returns the value of field price
     *
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the value of field inventory
     *
     * @return integer
     */
    public function getInventory()
    {
        return $this->inventory;
    }

    /**
     * Returns the value of field shelf_location
     *
     * @return string
     */
    public function getShelfLocation()
    {
        return $this->shelf_location;
    }

    /**
     * @return int
     */
    public function getIsLocked()
    {
        return $this->is_locked;
    }

    /**
     * Returns the value of field created
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Returns the value of field modified
     *
     * @return string
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @return int
     */
    public function getErpGoodsId()
    {
        return $this->erp_goods_id;
    }

    /**
     * @param int $erp_goods_id
     * @return SellerGoods
     */
    public function setErpGoodsId($erp_goods_id)
    {
        $this->erp_goods_id = $erp_goods_id;
        return $this;
    }

    public function beforeSave()
    {
        if ($this->logistic_require !== null) {
            /** @noinspection PhpParamsInspection */
            $this->logistic_require = json_encode(array_values($this->logistic_require));
        }
    }

    public function afterFetch()
    {
        $option = json_decode($this->logistic_require,true);
        if ($option === null) {
            $option = [];
        }
        $this->logistic_require = $option;
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
                
    const CACHE_KEY_RULE_LIST_BY_SELLER_ID = "list_by_seller_id";
    const CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_IS_COMBO = "list_by_seller_id_and_is_combo";
                
    /**
     * @return array
     */
    protected static function getUniqueKeys()
    {
        return ["seller_id,name","bar_code,seller_id","abbr_name,seller_id"];
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
            self::CACHE_KEY_RULE_LIST_BY_SELLER_ID => ['seller_id'],
            self::CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_IS_COMBO => ['seller_id,is_combo']
        ];
    }
            
	/**
	 * @param int $sellerId
	 * @return static[]
	 */
	public static function listBySellerId($sellerId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("seller_id = :seller_id:");
		$do->setBind([
			"seller_id" => $sellerId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_SELLER_ID);
		return parent::findUseDO($do);
	}

    /**
     * @param int $sellerId
     * @param int $isCombo
     * @return static[]
     */
    public static function listBySellerIdAndIsCombo($sellerId, $isCombo = 0)
    {
        $do = new ModelQueryDO();
        $do->setConditions("seller_id = :seller_id: and is_combo = :is_combo:");
        $do->setBind([
            "seller_id" => $sellerId,
            "is_combo" => $isCombo
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_IS_COMBO);
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
            