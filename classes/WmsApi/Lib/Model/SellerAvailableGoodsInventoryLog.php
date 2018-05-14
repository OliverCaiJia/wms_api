<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class SellerAvailableGoodsInventoryLog extends ModelBase
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $seller_available_goods_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $type;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $number;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $inventory_snapshot;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $reason;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $member_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $created;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
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
     * Method to set the value of field seller_available_goods_id
     *
     * @param integer $seller_available_goods_id
     * @return $this
     */
    public function setSellerAvailableGoodsId($seller_available_goods_id)
    {
        $this->seller_available_goods_id = $seller_available_goods_id;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

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
     * Method to set the value of field inventory_snapshot
     *
     * @param integer $inventory_snapshot
     * @return $this
     */
    public function setInventorySnapshot($inventory_snapshot)
    {
        $this->inventory_snapshot = $inventory_snapshot;

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
     * Method to set the value of field member_id
     *
     * @param integer $member_id
     * @return $this
     */
    public function setMemberId($member_id)
    {
        $this->member_id = $member_id;

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
     * Returns the value of field seller_available_goods_id
     *
     * @return integer
     */
    public function getSellerAvailableGoodsId()
    {
        return $this->seller_available_goods_id;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
     * Returns the value of field inventory_snapshot
     *
     * @return integer
     */
    public function getInventorySnapshot()
    {
        return $this->inventory_snapshot;
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
     * Returns the value of field member_id
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->member_id;
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
                
    const CACHE_KEY_RULE_LIST_BY_SELLER_AVAILABLE_GOODS_ID = "list_by_seller_available_goods_id";
    /**
     * @return array
     */
    static protected function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_SELLER_AVAILABLE_GOODS_ID => ['seller_available_goods_id'],
        ];
    }
            
	/**
	 * @param int $sellerAvailableGoodsId
	 * @return static[]
	 */
	static public function listBySellerAvailableGoodsId($sellerAvailableGoodsId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("seller_available_goods_id = :seller_available_goods_id:");
		$do->setBind([
			"seller_available_goods_id" => $sellerAvailableGoodsId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_SELLER_AVAILABLE_GOODS_ID);
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
            