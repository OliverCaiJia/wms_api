<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class FreightGroup extends ModelBase
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
    protected $logistic_company_id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var double
     */
    protected $first_weight_price;

    /**
     *
     * @var double
     */
    protected $added_weight_price;

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
     * Method to set the value of field logistic_company_id
     *
     * @param integer $logistic_company_id
     * @return $this
     */
    public function setLogisticCompanyId($logistic_company_id)
    {
        $this->logistic_company_id = $logistic_company_id;

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
     * Method to set the value of field first_weight_price
     *
     * @param double $first_weight_price
     * @return $this
     */
    public function setFirstWeightPrice($first_weight_price)
    {
        $this->first_weight_price = $first_weight_price;

        return $this;
    }

    /**
     * Method to set the value of field added_weight_price
     *
     * @param double $added_weight_price
     * @return $this
     */
    public function setAddedWeightPrice($added_weight_price)
    {
        $this->added_weight_price = $added_weight_price;

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
     * Returns the value of field logistic_company_id
     *
     * @return integer
     */
    public function getLogisticCompanyId()
    {
        return $this->logistic_company_id;
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
     * Returns the value of field first_weight_price
     *
     * @return double
     */
    public function getFirstWeightPrice()
    {
        return $this->first_weight_price;
    }

    /**
     * Returns the value of field added_weight_price
     *
     * @return double
     */
    public function getAddedWeightPrice()
    {
        return $this->added_weight_price;
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
                
    const CACHE_KEY_RULE_LIST_BY_LOGISTIC_COMPANY_ID = "list_by_logistic_company_id";
                
    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["logistic_company_id,name"];
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
            self::CACHE_KEY_RULE_LIST_BY_LOGISTIC_COMPANY_ID => ['logistic_company_id'],
        ];
    }
            
	/**
	 * @param int $logisticCompanyId
	 * @return static[]
	 */
	static public function listByLogisticCompanyId($logisticCompanyId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("logistic_company_id = :logistic_company_id:");
		$do->setBind([
			"logistic_company_id" => $logisticCompanyId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_LOGISTIC_COMPANY_ID);
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
            