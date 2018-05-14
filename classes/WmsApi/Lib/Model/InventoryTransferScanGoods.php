<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class InventoryTransferScanGoods extends ModelBase
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
    protected $inventory_transfer_id;

    /**
     *
     * @var integer
     */
    protected $seller_goods_id;

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
     * Method to set the value of field inventory_transfer_id
     *
     * @param integer $inventory_transfer_id
     * @return $this
     */
    public function setInventoryTransferId($inventory_transfer_id)
    {
        $this->inventory_transfer_id = $inventory_transfer_id;

        return $this;
    }

    /**
     * Method to set the value of field seller_goods_id
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
     * @return $this
     */
    public function setGoodsCode($goods_code)
    {
        $this->goods_code = $goods_code;

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
     * Returns the value of field inventory_transfer_id
     *
     * @return integer
     */
    public function getInventoryTransferId()
    {
        return $this->inventory_transfer_id;
    }

    /**
     * Returns the value of field seller_goods_id
     *
     * @return integer
     */
    public function getSellerGoodsId()
    {
        return $this->seller_goods_id;
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
     * Returns the value of field encode_type
     *
     * @return string
     */
    public function getEncodeType()
    {
        return $this->encode_type;
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
                
    const CACHE_KEY_RULE_LIST_BY_INVENTORY_TRANSFER_ID = "list_by_inventory_transfer_id";
    const CACHE_KEY_RULE_LIST_BY_INVENTORY_TRANSFER_ID_AND_SELLER_GOODS_ID = "list_by_inventory_transfer_id_and_seller_goods_id";

    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["inventory_transfer_id,goods_code"];
    }

    /**
     * @return array
     */
    static protected function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_INVENTORY_TRANSFER_ID => ['inventory_transfer_id'],
            self::CACHE_KEY_RULE_LIST_BY_INVENTORY_TRANSFER_ID_AND_SELLER_GOODS_ID => ['inventory_transfer_id,seller_goods_id']
        ];
    }
            
	/**
	 * @param int $inventoryTransferId
	 * @return static[]
	 */
	static public function listByInventoryTransferId($inventoryTransferId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("inventory_transfer_id = :inventory_transfer_id:");
		$do->setBind([
			"inventory_transfer_id" => $inventoryTransferId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_INVENTORY_TRANSFER_ID);
		return parent::findUseDO($do);
	}

    /**
     * @param int $inventoryTransferId
     * @param int $sellerGoodsId
     * @return static[]
     */
    static public function listByInventoryTransferIdAndSellerGoodsId($inventoryTransferId, $sellerGoodsId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("inventory_transfer_id = :inventory_transfer_id: and seller_goods_id = :seller_goods_id:");
        $do->setBind([
            "inventory_transfer_id" => $inventoryTransferId,
            "seller_goods_id" => $sellerGoodsId
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_INVENTORY_TRANSFER_ID_AND_SELLER_GOODS_ID);
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
            