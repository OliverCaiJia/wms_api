<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class OrderPickOrderRef extends ModelBase
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
    protected $pick_order_id;

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
     * Method to set the value of field pick_order_id
     *
     * @param integer $pick_order_id
     * @return $this
     */
    public function setPickOrderId($pick_order_id)
    {
        $this->pick_order_id = $pick_order_id;

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
     * Returns the value of field pick_order_id
     *
     * @return integer
     */
    public function getPickOrderId()
    {
        return $this->pick_order_id;
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

    const CACHE_KEY_RULE_LIST_ALL = "list_all";
                
    const CACHE_KEY_RULE_LIST_BY_PICK_ORDER_ID = "list_by_pick_order_id";
    const CACHE_KEY_RULE_LIST_BY_ORDER_ID = "list_by_order_id";
                
    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["order_id,pick_order_id"];
    }

    /**
     * @return int
     */
    static protected function getUniqueKeyEncodeWay()
    {
        return parent::CACHE_KEY_ENCODE_BASE64;
    }
            
    /**
     * @return array
     */
    static protected function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_PICK_ORDER_ID => ['pick_order_id'],
            self::CACHE_KEY_RULE_LIST_BY_ORDER_ID => ['order_id'],
        ];
    }
            
	/**
	 * @param int $pickOrderId
	 * @return static[]
	 */
	static public function listByPickOrderId($pickOrderId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("pick_order_id = :pick_order_id:");
		$do->setBind([
			"pick_order_id" => $pickOrderId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_PICK_ORDER_ID);
		return parent::findUseDO($do);
	}

	/**
	 * @param int $orderId
	 * @return static[]
	 */
	static public function listByOrderId($orderId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("order_id = :order_id:");
		$do->setBind([
			"order_id" => $orderId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_ORDER_ID);
		return parent::findUseDO($do);
	}


    /**
     * @return static[]
     */
    static public function listAll()
    {
        $do = new ModelQueryDO();
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_ALL);
        return parent::findUseDO($do);
    }
}
            