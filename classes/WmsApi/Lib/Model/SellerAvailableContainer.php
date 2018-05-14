<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class SellerAvailableContainer extends ModelBase
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
    protected $container_id;

    /**
     *
     * @var double
     */
    protected $price;

    /**
     *
     * @var integer
     */
    protected $quantity;

    /**
     *
     * @var integer
     */
    protected $disabled;

    /**
     *
     * @var string
     */
    protected $pay_mode;

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
     * Method to set the value of field price
     *
     * @param double $price
     * @return $this
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Method to set the value of field quantity
     *
     * @param integer $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Method to set the value of field disabled
     *
     * @param bool $disabled
     * @return $this
     */
    public function setDisabled($disabled)
    {
        $this->disabled = (int)$disabled;

        return $this;
    }

    /**
     * Method to set the value of field pay_mode
     *
     * @param string $pay_mode
     * @return $this
     */
    public function setPayMode($pay_mode)
    {
        $this->pay_mode = $pay_mode;

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
     * Returns the value of field container_id
     *
     * @return integer
     */
    public function getContainerId()
    {
        return $this->container_id;
    }

    /**
     * Returns the value of field price
     *
     * @return double
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Returns the value of field quantity
     *
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Returns the value of field disabled
     *
     * @return int
     */
    public function getDisabled()
    {
        return (int)$this->disabled;
    }

    /**
     * Returns the value of field pay_mode
     *
     * @return string
     */
    public function getPayMode()
    {
        return $this->pay_mode;
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

    const CACHE_KEY_RULE_LIST_ALL = 'list_all';
    const CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_DISABLED = 'list_by_seller_id_and_disabled';
    const CACHE_KEY_RULE_LIST_BY_CONTAINER_ID = 'list_by_container_id';
    const CACHE_KEY_RULE_LIST_BY_SELLER_ID = 'list_by_seller_id';

    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ['seller_id,container_id'];
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
            self::CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_DISABLED => ['seller_id,disabled'],
            self::CACHE_KEY_RULE_LIST_BY_CONTAINER_ID => ['container_id'],
            self::CACHE_KEY_RULE_LIST_BY_SELLER_ID => ['seller_id'],
        ];
    }

    /**
     * @param int $sellerId
     * @param bool $disabled
     * @return static[]
     */
    static public function listBySellerIdAndDisabled($sellerId, $disabled)
    {
        $do = new ModelQueryDO();
        $do->setConditions('seller_id = :seller_id: and disabled = :disabled:');
        $do->setBind([
            'seller_id' => $sellerId,
            'disabled' => $disabled,
        ]);
        $do->setOrderBy('id DESC');
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_DISABLED);
        return parent::findUseDO($do);
    }

    /**
     * @param int $containerId
     * @return static[]
     */
    static public function listByContainerId($containerId)
    {
        $do = new ModelQueryDO();
        $do->setConditions('container_id = :container_id:');
        $do->setBind([
            'container_id' => $containerId,
        ]);
        $do->setOrderBy('id DESC');
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_CONTAINER_ID);
        return parent::findUseDO($do);
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
        $do->setOrderBy('id DESC');
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_ALL);
        return parent::findUseDO($do);
    }
}
            