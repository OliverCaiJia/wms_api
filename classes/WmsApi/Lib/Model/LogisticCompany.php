<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class LogisticCompany extends ModelBase
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
    protected $usable_logistic_company_id;


    /**
     *
     * @var string
     */
    protected $customer_name;

    /**
     *
     * @var string
     */
    protected $customer_pwd;

    /**
     *
     * @var string
     */
    protected $send_site;

    /**
     *
     * @var string
     */
    protected $month_code;

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
     * Method to set the value of field usable_logistic_company_id
     *
     * @param integer $usable_logistic_company_id
     * @return $this
     */
    public function setUsableLogisticCompanyId($usable_logistic_company_id)
    {
        $this->usable_logistic_company_id = $usable_logistic_company_id;

        return $this;
    }

    /**
     * Method to set the value of field customer_name
     *
     * @param string $customer_name
     * @return $this
     */
    public function setCustomerName($customer_name)
    {
        $this->customer_name = $customer_name;

        return $this;
    }

    /**
     * Method to set the value of field customer_pwd
     *
     * @param string $customer_pwd
     * @return $this
     */
    public function setCustomerPwd($customer_pwd)
    {
        $this->customer_pwd = $customer_pwd;

        return $this;
    }

    /**
     * Method to set the value of field send_site
     *
     * @param string $send_site
     * @return $this
     */
    public function setSendSite($send_site)
    {
        $this->send_site = $send_site;

        return $this;
    }

    /**
     * Method to set the value of field month_code
     *
     * @param string $month_code
     * @return $this
     */
    public function setMonthCode($month_code)
    {
        $this->month_code = $month_code;

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
     * Returns the value of field usable_logistic_company_id
     *
     * @return integer
     */
    public function getUsableLogisticCompanyId()
    {
        return $this->usable_logistic_company_id;
    }

    /**
     * Returns the value of field customer_name
     *
     * @return string
     */
    public function getCustomerName()
    {
        return $this->customer_name;
    }

    /**
     * Returns the value of field customer_pwd
     *
     * @return string
     */
    public function getCustomerPwd()
    {
        return $this->customer_pwd;
    }

    /**
     * Returns the value of field send_site
     *
     * @return string
     */
    public function getSendSite()
    {
        return $this->send_site;
    }

    /**
     * Returns the value of field month_code
     *
     * @return string
     */
    public function getMonthCode()
    {
        return $this->month_code;
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
        return ["usable_logistic_company_id"];
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
            