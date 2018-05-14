<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class LogisticOrderGoods extends ModelBase
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
    protected $logistic_order_id;

    /**
     *
     * @var integer
     */
    protected $goods_id;

    /**
     *
     * @var integer
     */
    protected $goods_number;

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
     * Method to set the value of field logistic_order_id
     *
     * @param integer $logistic_order_id
     * @return $this
     */
    public function setLogisticOrderId($logistic_order_id)
    {
        $this->logistic_order_id = $logistic_order_id;

        return $this;
    }

    /**
     * Method to set the value of field goods_id
     *
     * @param integer $goods_id
     * @return $this
     */
    public function setGoodsId($goods_id)
    {
        $this->goods_id = $goods_id;

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
     * Returns the value of field logistic_order_id
     *
     * @return integer
     */
    public function getLogisticOrderId()
    {
        return $this->logistic_order_id;
    }

    /**
     * Returns the value of field goods_id
     *
     * @return integer
     */
    public function getGoodsId()
    {
        return $this->goods_id;
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
     * Returns the value of field price
     *
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
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
                
    const CACHE_KEY_RULE_LIST_BY_LOGISTIC_ORDER_ID = "list_by_logistic_order_id";
                
    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["logistic_order_id,goods_id"];
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
            self::CACHE_KEY_RULE_LIST_BY_LOGISTIC_ORDER_ID => ['logistic_order_id'],
        ];
    }
            
	/**
	 * @param int $logisticOrderId
	 * @return static[]
	 */
	static public function listByLogisticOrderId($logisticOrderId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("logistic_order_id = :logistic_order_id:");
		$do->setBind([
			"logistic_order_id" => $logisticOrderId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_LOGISTIC_ORDER_ID);
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
            