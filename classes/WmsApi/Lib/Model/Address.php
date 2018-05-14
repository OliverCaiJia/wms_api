<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class Address extends ModelBase
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
     * @var integer
     */
    protected $parent_id;

    /**
     *
     * @var integer
     */
    protected $level;

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
     * Method to set the value of field parent_id
     *
     * @param integer $parent_id
     * @return $this
     */
    public function setParentId($parent_id)
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    /**
     * Method to set the value of field level
     *
     * @param integer $level
     * @return $this
     */
    public function setLevel($level)
    {
        $this->level = $level;

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
     * Returns the value of field parent_id
     *
     * @return integer
     */
    public function getParentId()
    {
        return $this->parent_id;
    }

    /**
     * Returns the value of field level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
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
    const CACHE_KEY_RULE_LIST_ALL_PROVINCE = "list_all_province";
    const CACHE_KEY_RULE_LIST_ALL_BY_LEVEL_AND_PARENT_ID = "list_by_level_and_parent_id";
    const CACHE_KEY_RULE_LIST_BY_PARENT_ID = "list_by_parent_id";


    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["name,parent_id"];
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
            self::CACHE_KEY_RULE_LIST_ALL_PROVINCE => ['level'],
            self::CACHE_KEY_RULE_LIST_ALL_BY_LEVEL_AND_PARENT_ID =>['level,parent_id'],
            self::CACHE_KEY_RULE_LIST_BY_PARENT_ID => ['parent_id']
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

    /**
     * @return static[]
     */
    static public function listAllProvince()
    {
        $do = new ModelQueryDO();
        $do->setConditions("level = 1");
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_ALL_PROVINCE);
        return parent::findUseDO($do);
    }

    /**
     * @param int $level
     * @param mixed $parentId
     * @return static[]
     */
    static public function listAllByLevelAndParentId($level,$parentId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("level = :level: and parent_id = :parent_id:");
        $do->setBind([
            "level" => $level,
            "parent_id" => $parentId,
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_ALL_BY_LEVEL_AND_PARENT_ID);
        return parent::findUseDO($do);
    }

    /**
     * @param int $parentId
     * @return static[]
     */
    static public function listByParentId($parentId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("parent_id = :parent_id:");
        $do->setBind([
            "parent_id" => $parentId
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_PARENT_ID);
        return parent::findUseDO($do);
    }

}
            