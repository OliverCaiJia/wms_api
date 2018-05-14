<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class Seller extends ModelBase
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $comment;

    /**
     *
     * @var double
     */
    protected $credit_line;

    /**
     *
     * @var double
     */
    protected $account_balance;

    /**
     *
     * @var integer
     */
    protected $seller_freight_group_id;

    /**
     *
     * @var bool
     */
    protected $is_weight_set;

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
     * Method to set the value of field comment
     *
     * @param string $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Method to set the value of field credit_line
     *
     * @param float $credit_line
     * @return Seller
     */
    public function setCreditLine($credit_line)
    {
        $this->credit_line = $credit_line;
        return $this;
    }

    /**
     * Method to set the value of field account_balance
     *
     * @param double $account_balance
     * @return $this
     */
    public function setAccountBalance($account_balance)
    {
        $this->account_balance = $account_balance;

        return $this;
    }

    /**
     * Method to set the value of field seller_freight_group_id
     *
     * @param integer $seller_freight_group_id
     * @return $this
     */
    public function setSellerFreightGroupId($seller_freight_group_id)
    {
        $this->seller_freight_group_id = $seller_freight_group_id;

        return $this;
    }

    /**
     * Method to set the value of field is_weight_set
     *
     * @param integer $is_weight_set
     * @return $this
     */
    public function setIsWeightSet($is_weight_set)
    {
        $this->is_weight_set = (int)$is_weight_set;

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
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Returns the value of field credit_line
     *
     * @return float
     */
    public function getCreditLine()
    {
        return $this->credit_line;
    }

    /**
     * Returns the value of field account_balance
     *
     * @return float
     */
    public function getAccountBalance()
    {
        return $this->account_balance;
    }

    /**
     * Returns the value of field seller_freight_group_id
     *
     * @return integer
     */
    public function getSellerFreightGroupId()
    {
        return $this->seller_freight_group_id;
    }

    /**
     * Returns the value of field is_weight_set
     *
     * @return integer
     */
    public function getIsWeightSet()
    {
        return (bool)$this->is_weight_set;
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
    protected static function getUniqueKeys()
    {
        return ["name"];
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
        ];
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
            