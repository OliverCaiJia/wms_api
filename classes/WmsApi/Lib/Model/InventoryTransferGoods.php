<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class InventoryTransferGoods extends ModelBase
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
    protected $acceptor_goods_id;

    /**
     *
     * @var integer
     */
    protected $goods_number;

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
     * Method to set the value of field acceptor_goods_id
     *
     * @param integer $acceptor_goods_id
     * @return $this
     */
    public function setAcceptorGoodsId($acceptor_goods_id)
    {
        $this->acceptor_goods_id = $acceptor_goods_id;

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
     * Returns the value of field acceptor_goods_id
     *
     * @return integer
     */
    public function getAcceptorGoodsId()
    {
        return $this->acceptor_goods_id;
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
                
    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["inventory_transfer_id,seller_goods_id"];
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
            self::CACHE_KEY_RULE_LIST_BY_INVENTORY_TRANSFER_ID => ['inventory_transfer_id'],
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
            