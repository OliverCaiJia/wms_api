<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class GoodsBreakageLog extends ModelBase
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
    protected $seller_goods_id;

    /**
     *
     * @var integer
     */
    protected $number;

    /**
     *
     * @var string
     */
    protected $encode_type;

    /**
     *
     * @var string
     */
    protected $goods_code;

    /**
     *
     * @var string
     */
    protected $reason;

    /**
     *
     * @var integer
     */
    protected $status;

    /**
     *
     * @var integer
     */
    protected $declarant;

    /**
     *
     * @var integer
     */
    protected $approver;

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
     * Method to set the value of field goods_id
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
     * Method to set the value of field number
     *
     * @param integer $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

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
     * Method to set the value of field goods_code
     *
     * @param string $goods_code
     * @return $this
     */
    public function setGoodsCode($goods_code)
    {
        $this->goods_code = $goods_code;

        return $this;
    }

    /**
     * Method to set the value of field reason
     *
     * @param string $reason
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param integer $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field declarant
     *
     * @param integer $declarant
     * @return $this
     */
    public function setDeclarant($declarant)
    {
        $this->declarant = $declarant;

        return $this;
    }

    /**
     * Method to set the value of field approver
     *
     * @param integer $approver
     * @return $this
     */
    public function setApprover($approver)
    {
        $this->approver = $approver;

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
     * Returns the value of field goods_id
     *
     * @return integer
     */
    public function getSellerGoodsId()
    {
        return $this->seller_goods_id;
    }

    /**
     * Returns the value of field number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
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
     * Returns the value of field goods_code
     *
     * @return string
     */
    public function getGoodsCode()
    {
        return $this->goods_code;
    }

    /**
     * Returns the value of field reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Returns the value of field status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field declarant
     *
     * @return integer
     */
    public function getDeclarant()
    {
        return $this->declarant;
    }

    /**
     * Returns the value of field approver
     *
     * @return integer
     */
    public function getApprover()
    {
        return $this->approver;
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
            