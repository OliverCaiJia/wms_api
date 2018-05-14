<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class OrderGoods extends ModelBase
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
    protected $order_id;

    /**
     *
     * @var integer
     */
    protected $seller_goods_id;

    /**
     *
     * @var string
     */
    protected $goods_name;

    /**
     *
     * @var string
     */
    protected $unique_code;

    /**
     *
     * @var integer
     */
    protected $goods_number;

    /**
     *
     * @var integer
     */
    protected $is_split;

    /**
     *
     * @var double
     */
    protected $price;

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
     * Method to set the value of field order_id
     *
     * @param integer $order_id
     * @return $this
     */
    public function setOrderId($order_id)
    {
        $this->order_id = $order_id;

        return $this;
    }

    /**
     * Method to set the value of field seller_goods_id
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
     * @param string $goods_name
     * @return OrderGoods
     */
    public function setGoodsName($goods_name)
    {
        $this->goods_name = $goods_name;
        return $this;
    }

    /**
     * Method to set the value of field unique_code
     *
     * @param string $unique_code
     * @return $this
     */
    public function setUniqueCode($unique_code)
    {
        $this->unique_code = $unique_code;

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
     * @param float $price
     * @return OrderGoods
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * Method to set the value of field is_split
     *
     * @param integer $is_split
     * @return $this
     */
    public function setIsSplit($is_split)
    {
        $this->is_split = (int)$is_split;

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
     * Returns the value of field order_id
     *
     * @return integer
     */
    public function getOrderId()
    {
        return $this->order_id;
    }

    /**
     * Returns the value of field seller_goods_id
     *
     * @return integer
     */
    public function getSellerGoodsId()
    {
        return $this->seller_goods_id;
    }

    /**
     * @return string
     */
    public function getGoodsName()
    {
        return $this->goods_name;
    }

    /**
     * Returns the value of field unique_code
     *
     * @return string
     */
    public function getUniqueCode()
    {
        return $this->unique_code;
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
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the value of field is_split
     *
     * @return integer
     */
    public function getIsSplit()
    {
        return (bool)$this->is_split;
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
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setConnectionService(ServiceName::DB_WMS);
    }

    const CACHE_KEY_RULE_LIST_ALL = 'list_all';
    const CACHE_KEY_RULE_LIST_BY_ORDER_ID = 'list_by_order_id';

    /**
     * @return array
     */
    protected static function getUniqueKeys()
    {
        return ['order_id,seller_goods_id'];
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
            self::CACHE_KEY_RULE_LIST_BY_ORDER_ID => ['order_id'],
        ];
    }
            
	/**
	 * @param int $orderId
	 * @return static[]
	 */
	public static function listByOrderId($orderId)
	{
		$do = new ModelQueryDO();
		$do->setConditions('order_id = :order_id:');
		$do->setBind([
			'order_id' => $orderId,
		]);
		$do->setOrderBy('id DESC');

		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_ORDER_ID);
		return parent::findUseDO($do);
	}

    /**
     * @return static[]
     */
    public static function listAll()
    {
        $do = new ModelQueryDO();
        $do->setOrderBy('id DESC');
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_ALL);
        return parent::findUseDO($do);
    }
}
            