<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class SellerFreightGroup extends ModelBase
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
    protected $seller_id;

    /**
     *
     * @var integer
     */
    protected $logistic_company_id;

    /**
     *
     * @var integer
     */
    protected $freight_group_id;

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
     * Method to set the value of field freight_group_id
     *
     * @param integer $freight_group_id
     * @return $this
     */
    public function setFreightGroupId($freight_group_id)
    {
        $this->freight_group_id = $freight_group_id;

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
     * Returns the value of field logistic_company_id
     *
     * @return integer
     */
    public function getLogisticCompanyId()
    {
        return $this->logistic_company_id;
    }

    /**
     * Returns the value of field freight_group_id
     *
     * @return integer
     */
    public function getFreightGroupId()
    {
        return $this->freight_group_id;
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
                
    const CACHE_KEY_RULE_LIST_BY_SELLER_ID = "list_by_seller_id";
                
    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["seller_id,logistic_company_id"];
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
            self::CACHE_KEY_RULE_LIST_BY_SELLER_ID => ['seller_id'],
        ];
    }
            
	/**
	 * @param int $sellerId
	 * @return static[]
	 */
	static public function listBySellerId($sellerId)
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
            