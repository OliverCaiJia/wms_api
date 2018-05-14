<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\Enum\LogisticOrderStatusEnum;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class PickOrder extends ModelBase
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
    protected $picker_id;

    /**
     *
     * @var integer
     */
    protected $logistic_order_id;

    /**
     *
     * @var integer
     */
    protected $seller_goods_id;

    /**
     *
     * @var integer
     */
    protected $pack_order_id;

    /**
     *
     * @var integer
     */
    protected $auditor_id;

    /**
     *
     * @var integer
     */
    protected $status;

    /**
     *
     * @var integer
     */
    protected $container_id;

    /**
     *
     * @var double
     */
    protected $total_weight;

    /**
     * @var bool
     */
    protected $printable;

    /**
     * @var bool
     */
    protected $is_prepack;

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
     * Method to set the value of field picker_id
     *
     * @param integer $picker_id
     * @return $this
     */
    public function setPickerId($picker_id)
    {
        $this->picker_id = $picker_id;

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
     * Method to set the value of field pack_order_id
     *
     * @param integer $pack_order_id
     * @return $this
     */
    public function setPackOrderId($pack_order_id)
    {
        $this->pack_order_id = $pack_order_id;

        return $this;
    }

    /**
     * Method to set the value of field auditor_id
     *
     * @param integer $auditor_id
     * @return $this
     */
    public function setAuditorId($auditor_id)
    {
        $this->auditor_id = $auditor_id;

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
     * Method to set the value of field container_id
     *
     * @param integer $container_id
     * @return $this
     */
    public function setContainerId($container_id)
    {
        $this->container_id = $container_id;

        return $this;
    }

    /**
     * Method to set the value of field total_weight
     *
     * @param double $total_weight
     * @return $this
     */
    public function setTotalWeight($total_weight)
    {
        $this->total_weight = $total_weight;

        return $this;
    }

    /**
     * Method to set the value of field printable
     *
     * @param bool $printable
     * @return $this
     */
    public function setPrintable($printable)
    {
        $this->printable = (int)$printable;

        return $this;
    }

    /**
     * Method to set the value of field is_prepack
     *
     * @param bool $is_prepack
     * @return $this
     */
    public function setIsPrepack($is_prepack)
    {
        $this->is_prepack = (int)$is_prepack;

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
     * Returns the value of field picker_id
     *
     * @return integer
     */
    public function getPickerId()
    {
        return $this->picker_id;
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
     * Returns the value of field seller_goods_id
     *
     * @return integer
     */
    public function getSellerGoodsId()
    {
        return $this->seller_goods_id;
    }

    /**
     * Returns the value of field pack_order_id
     *
     * @return integer
     */
    public function getPackOrderId()
    {
        return $this->pack_order_id;
    }

    /**
     * Returns the value of field auditor_id
     *
     * @return integer
     */
    public function getAuditorId()
    {
        return $this->auditor_id;
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
     * Returns the value of field container_id
     *
     * @return integer
     */
    public function getContainerId()
    {
        return $this->container_id;
    }

    /**
     * Returns the value of field total_weight
     *
     * @return double
     */
    public function getTotalWeight()
    {
        return $this->total_weight;
    }

    /**
     * Returns the value of field printable
     *
     * @return bool
     */
    public function getPrintable()
    {
        return (bool)$this->printable;
    }

    /**
     * Returns the value of field is_prepack
     *
     * @return bool
     */
    public function getIsPrepack()
    {
        return (bool)$this->is_prepack;
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
        return ["logistic_order_id","pack_order_id"];
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
        $do->setConditions('seller_id = :seller_id:');
        $do->setBind([
            'seller_id' => $sellerId,
        ]);
        $do->setOrderBy('id DESC');
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

    /**
     * @param int $sellerGoodsId
     * @return static
     */
    static public function getPrepackOrder($sellerGoodsId)
    {
        $do = new ModelQueryDO();
        $do->setConditions('seller_goods_id = :seller_goods_id: and status = :status: and printable = :printable: and is_prepack = :is_prepack:');
        $do->setBind([
            'seller_goods_id' => $sellerGoodsId,
            'status' => LogisticOrderStatusEnum::WAIT_PICK,
            'printable' => 1,
            'is_prepack' => 0
        ]);
        return parent::findFirstUseDO($do);
    }

    /**
     * @param int $status
     * @return static[]
     */
    public static function listByStatus($status)
    {
        $do = new ModelQueryDO();
        $do->setConditions('status = :status:');
        $do->setBind([
            'status' => $status,
        ]);
        $do->setOrderBy('id DESC');
        return parent::findUseDO($do);
    }

    /**
     * @return static[]
     */
    public static function WaitPickList()
    {
        $do = new ModelQueryDO();
        $do->setConditions('status = :status:');
        $do->setBind([
            'status' => LogisticOrderStatusEnum::WAIT_PICK,
        ]);
        $do->setOrderBy('id DESC');
        return parent::findUseDO($do);
    }

    /**
     * @param int $sellerId
     * @return static[]
     */
    public static function getPrintableSellerGoods($sellerId)
    {
        $do = new ModelQueryDO();
        $do->setColumns('seller_goods_id as sellerGoodsId,count(*) as number');
        $do->setConditions('seller_id = :seller_id: and status = :status: and seller_goods_id > 0 and printable = :printable: and is_prepack = :is_prepack:');
        $do->setBind([
            'seller_id' => $sellerId,
            'status' => LogisticOrderStatusEnum::WAIT_PICK,
            'printable' => '1',
            'is_prepack' => 0
        ]);
        $do->setGroupBy('seller_goods_id');
        $do->setOrderBy('number DESC');
        $do->setLimit(10);
        return parent::findUseDO($do);
    }

}
            