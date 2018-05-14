<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class RoleAcl extends ModelBase
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
    protected $role_id;

    /**
     *
     * @var integer
     */
    protected $module_action_id;

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
     * Method to set the value of field role_id
     *
     * @param integer $role_id
     * @return $this
     */
    public function setRoleId($role_id)
    {
        $this->role_id = $role_id;

        return $this;
    }

    /**
     * Method to set the value of field module_action_id
     *
     * @param integer $module_action_id
     * @return $this
     */
    public function setModuleActionId($module_action_id)
    {
        $this->module_action_id = $module_action_id;

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
     * Returns the value of field role_id
     *
     * @return integer
     */
    public function getRoleId()
    {
        return $this->role_id;
    }

    /**
     * Returns the value of field module_action_id
     *
     * @return integer
     */
    public function getModuleActionId()
    {
        return $this->module_action_id;
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
    const CACHE_KEY_RULE_LIST_BY_ROLE_ID = "list_by_role_id";
    const CACHE_KEY_RULE_LIST_BY_MODULE_ACTION_ID = "list_by_module_action_id";

    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["role_id,module_action_id"];
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
            self::CACHE_KEY_RULE_LIST_BY_ROLE_ID => ['role_id'],
            self::CACHE_KEY_RULE_LIST_BY_MODULE_ACTION_ID => ['module_action_id'],
        ];
    }
            
	/**
	 * @param int $roleId
	 * @return static[]
	 */
	static public function listByRoleId($roleId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("role_id = :role_id:");
		$do->setBind([
			"role_id" => $roleId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_ROLE_ID);
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
     * @param int $moduleActionId
     * @return static[]
     */
    static public function listByModuleActionId($moduleActionId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("module_action_id = :module_action_id:");
        $do->setBind([
            "module_action_id" => $moduleActionId,
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_MODULE_ACTION_ID);
        return parent::findUseDO($do);
    }



}
            