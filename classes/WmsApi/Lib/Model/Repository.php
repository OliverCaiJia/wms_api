<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class Repository extends ModelBase
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
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     *
     * @var integer
     * @Column(type="integer", length=11, nullable=false)
     */
    protected $warehouse_id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    protected $disabled;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $repository_code;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $use_attribute;

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
     * Method to set the value of field warehouse_id
     *
     * @param integer $warehouse_id
     * @return $this
     */
    public function setWarehouseId($warehouse_id)
    {
        $this->warehouse_id = $warehouse_id;

        return $this;
    }

    /**
     * Method to set the value of field disabled
     *
     * @param integer $disabled
     * @return $this
     */
    public function setDisabled($disabled)
    {
        $this->disabled = (int)$disabled;

        return $this;
    }

    /**
     * Method to set the value of field repository_code
     *
     * @param string $repository_code
     * @return $this
     */
    public function setRepositoryCode($repository_code)
    {
        $this->repository_code = $repository_code;

        return $this;
    }

    /**
     * Method to set the value of field use_attribute
     *
     * @param string $use_attribute
     * @return $this
     */
    public function setUseAttribute($use_attribute)
    {
        $this->use_attribute = $use_attribute;

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
     * Returns the value of field warehouse_id
     *
     * @return integer
     */
    public function getWarehouseId()
    {
        return $this->warehouse_id;
    }

    /**
     * Returns the value of field disabled
     *
     * @return bool
     */
    public function getDisabled()
    {
        return (bool)$this->disabled;
    }

    /**
     * Returns the value of field repository_code
     *
     * @return string
     */
    public function getRepositoryCode()
    {
        return $this->repository_code;
    }

    /**
     * Returns the value of field use_attribute
     *
     * @return string
     */
    public function getUseAttribute()
    {
        return $this->use_attribute;
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
    const CACHE_KEY_RULE_LIST_BY_WAREHOUSE_ID = "list_by_warehouse_id";

    /**
     * @return array
     */
    protected static function getUniqueKeys()
    {
        return ["warehouse_id","name"];
    }

    /**
     * @return array
     */
    static protected function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_WAREHOUSE_ID => ['warehouse_id']
        ];
    }

    /**
     * @param int $warehouseId
     * @return static[]
     */
    public static function listByWarehouseId($warehouseId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("warehouse_id = :warehouse_id:");
        $do->setBind([
            "warehouse_id" => $warehouseId,
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_WAREHOUSE_ID);
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
            