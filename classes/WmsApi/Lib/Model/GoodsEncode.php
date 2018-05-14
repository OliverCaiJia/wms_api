<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class GoodsEncode extends ModelBase
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
    protected $seller_goods_id;

    /**
     *
     * @var integer
     */
    protected $seller_id;

    /**
     *
     * @var string
     */
    protected $goods_code;

    /**
     *
     * @var integer
     */
    protected $inventory_status;

    /**
     *
     * @var string
     */
    protected $batch_number;

    /**
     *
     * @var int
     */
    protected $is_loss;

    /**
     *
     * @var int
     */
    protected $is_printed;

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
     * Method to set the value of field inventory_status
     *
     * @param integer $inventory_status
     * @return $this
     */
    public function setInventoryStatus($inventory_status)
    {
        $this->inventory_status = $inventory_status;

        return $this;
    }

    /**
     * @param string $batch_number
     * @return GoodsEncode
     */
    public function setBatchNumber($batch_number)
    {
        $this->batch_number = $batch_number;
        return $this;
    }

    /**
     * Method to set the value of field is_loss
     *
     * @param int $is_loss
     * @return GoodsEncode
     */
    public function setIsLoss($is_loss)
    {
        $this->is_loss = (int)$is_loss;
        return $this;
    }

    /**
     * @param int $is_printed
     * @return GoodsEncode
     */
    public function setIsPrinted($is_printed)
    {
        $this->is_printed = (int)$is_printed;
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
     * Returns the value of field goods_id
     *
     * @return integer
     */
    public function getSellerGoodsId()
    {
        return $this->seller_goods_id;
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
     * Returns the value of field inventory_status
     *
     * @return integer
     */
    public function getInventoryStatus()
    {
        return $this->inventory_status;
    }

    /**
     * @return string
     */
    public function getBatchNumber()
    {
        return $this->batch_number;
    }

    /**
     * Returns the value of field is_loss
     *
     * @return bool
     */
    public function getIsLoss()
    {
        return (bool)$this->is_loss;
    }

    /**
     * @return bool
     */
    public function getIsPrinted()
    {
        return (bool)$this->is_printed;
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
    const CACHE_KEY_RULE_LIST_BY_SELLER_GOODS_ID = "list_by_seller_goods_id";

    /**
     * @return array
     */
    protected static function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_SELLER_GOODS_ID =>["seller_goods_id"],
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

    /**
     * @param int $sellerGoodsId
     * @return static[]
     */
    public static function listBySellerGoodsId($sellerGoodsId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("seller_goods_id = :seller_goods_id:");
        $do->setBind([
            "seller_goods_id" => $sellerGoodsId,
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_SELLER_GOODS_ID);
        return parent::findUseDO($do);
    }

    /**
     * @param int $sellerGoodsId
     * @param int $limit
     * @param array $notInList
     * @return static[]
     */
    public static function listUsableByLimit($sellerGoodsId, $limit , array $notInList = [])
    {
        $qureyStr = "";
        foreach ($notInList as $key => $value) {
                $qureyStr .= "and goods_code !='$value'";
        }

        $do = new ModelQueryDO();
        $do->setConditions("seller_goods_id = :seller_goods_id: and inventory_status = :inventory_status: 
                            and is_loss = :is_loss: $qureyStr");
        $do->setBind([
            "seller_goods_id" => $sellerGoodsId,
            "inventory_status" => 2,
            "is_loss" => 0,
        ]);
        $do->setLimit($limit);
        $do->setOrderBy("id DESC");
        return parent::findUseDO($do);
    }
}
            