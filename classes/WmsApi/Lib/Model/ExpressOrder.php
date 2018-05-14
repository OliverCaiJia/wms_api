<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class ExpressOrder extends ModelBase
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
    protected $logistic_company_id;

    /**
     *
     * @var string
     */
    protected $express_sn;

    /**
     *
     * @var string
     */
    protected $mark_destination;

    /**
     *
     * @var string
     */
    protected $origin_code;

    /**
     *
     * @var string
     */
    protected $origin_name;

    /**
     *
     * @var string
     */
    protected $destination_code;

    /**
     *
     * @var string
     */
    protected $destination_name;

    /**
     *
     * @var string
     */
    protected $sorting_code;

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
     * Method to set the value of field express_sn
     *
     * @param string $express_sn
     * @return $this
     */
    public function setExpressSn($express_sn)
    {
        $this->express_sn = $express_sn;

        return $this;
    }

    /**
     * Method to set the value of field mark_destination
     *
     * @param string $mark_destination
     * @return $this
     */
    public function setMarkDestination($mark_destination)
    {
        $this->mark_destination = $mark_destination;

        return $this;
    }

    /**
     * Method to set the value of field origin_code
     *
     * @param string $origin_code
     * @return $this
     */
    public function setOriginCode($origin_code)
    {
        $this->origin_code = $origin_code;

        return $this;
    }

    /**
     * Method to set the value of field origin_name
     *
     * @param string $origin_name
     * @return $this
     */
    public function setOriginName($origin_name)
    {
        $this->origin_name = $origin_name;

        return $this;
    }

    /**
     * Method to set the value of field destination_code
     *
     * @param string $destination_code
     * @return $this
     */
    public function setDestinationCode($destination_code)
    {
        $this->destination_code = $destination_code;

        return $this;
    }

    /**
     * Method to set the value of field destination_name
     *
     * @param string $destination_name
     * @return $this
     */
    public function setDestinationName($destination_name)
    {
        $this->destination_name = $destination_name;

        return $this;
    }

    /**
     * Method to set the value of field sorting_code
     *
     * @param string $sorting_code
     * @return $this
     */
    public function setSortingCode($sorting_code)
    {
        $this->sorting_code = $sorting_code;

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
     * Returns the value of field logistic_company_id
     *
     * @return integer
     */
    public function getLogisticCompanyId()
    {
        return $this->logistic_company_id;
    }

    /**
     * Returns the value of field express_sn
     *
     * @return string
     */
    public function getExpressSn()
    {
        return $this->express_sn;
    }

    /**
     * Returns the value of field mark_destination
     *
     * @return string
     */
    public function getMarkDestination()
    {
        return $this->mark_destination;
    }

    /**
     * Returns the value of field origin_code
     *
     * @return string
     */
    public function getOriginCode()
    {
        return $this->origin_code;
    }

    /**
     * Returns the value of field origin_name
     *
     * @return string
     */
    public function getOriginName()
    {
        return $this->origin_name;
    }

    /**
     * Returns the value of field destination_code
     *
     * @return string
     */
    public function getDestinationCode()
    {
        return $this->destination_code;
    }

    /**
     * Returns the value of field destination_name
     *
     * @return string
     */
    public function getDestinationName()
    {
        return $this->destination_name;
    }

    /**
     * Returns the value of field sorting_code
     *
     * @return string
     */
    public function getSortingCode()
    {
        return $this->sorting_code;
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
            
                
    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["express_sn","logistic_order_id,logistic_company_id"];
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
        ];
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
            