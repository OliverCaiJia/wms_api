<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class LogisticOrderScanGoods extends ModelBase
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
     * @var string
     */
    protected $goods_code;

    /**
     *
     * @var string
     */
    protected $encode_type;

    /**
     *
     * @var double
     */
    protected $goods_total_weight;

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
     * Method to set the value of field goods_code
     *
     * @param string $goods_code
     * @return LogisticOrderScanGoods
     */
    public function setGoodsCode($goods_code)
    {
        $this->goods_code = $goods_code;
        return $this;
    }


    /**
     * @param string $encode_type
     * @return LogisticOrderScanGoods
     */
    public function setEncodeType($encode_type)
    {
        $this->encode_type = $encode_type;
        return $this;
    }

    /**
     * @param float $goods_total_weight
     * @return LogisticOrderScanGoods
     */
    public function setGoodsTotalWeight($goods_total_weight)
    {
        $this->goods_total_weight = $goods_total_weight;
        return $this;
    }

    /**
     * @param string $created
     * @return LogisticOrderScanGoods
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @param string $modified
     * @return LogisticOrderScanGoods
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
     * Returns the value of field goods_code
     *
     * @return string
     */
    public function getGoodsCode()
    {
        return $this->goods_code;
    }

    /**
     * @return string
     */
    public function getEncodeType()
    {
        return $this->encode_type;
    }

    /**
     * @return float
     */
    public function getGoodsTotalWeight()
    {
        return $this->goods_total_weight;
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
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
    const CACHE_KEY_RULE_LIST_BY_LOGISTIC_ORDER_ID_AND_GOODS_ID = "list_by_logistic_order_id_and_goods_id";

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
            self::CACHE_KEY_RULE_LIST_BY_LOGISTIC_ORDER_ID_AND_GOODS_ID => ['logistic_order_id,goods_id']
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



    /**
     * @param int $logisticOrderId
     * @param int $goodsId
     * @return static[]
     */
    static public function listByLogisticOrderIdAndGoodsId($logisticOrderId,$goodsId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("logistic_order_id = :logistic_order_id: AND goods_id = :goods_id:");
        $do->setBind([
            "logistic_order_id" => $logisticOrderId,
            "goods_id" => $goodsId,
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_LOGISTIC_ORDER_ID_AND_GOODS_ID);
        return parent::findUseDO($do);
    }
}
            