<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class Location extends ModelBase
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
    protected $repository_id;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    protected $location_code;

    /**
     *
     * @var string
     * @Column(type="string", nullable=false)
     */
    protected $abc;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=false)
     */
    protected $disabled;

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
     * Method to set the value of field repository_id
     *
     * @param integer $repository_id
     * @return $this
     */
    public function setRepositoryId($repository_id)
    {
        $this->repository_id = $repository_id;

        return $this;
    }

    /**
     * Method to set the value of field location_code
     *
     * @param string $location_code
     * @return $this
     */
    public function setLocationCode($location_code)
    {
        $this->location_code = $location_code;

        return $this;
    }

    /**
     * Method to set the value of field activity_based_classification
     *
     * @param string $abc
     * @return $this
     */
    public function setAbc($abc)
    {
        $this->abc = $abc;

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
     * Returns the value of field repository_id
     *
     * @return integer
     */
    public function getRepositoryId()
    {
        return $this->repository_id;
    }

    /**
     * Returns the value of field location_code
     *
     * @return string
     */
    public function getLocationCode()
    {
        return $this->location_code;
    }

    /**
     * Returns the value of field activity_based_classification
     *
     * @return string
     */
    public function getAbc()
    {
        return $this->abc;
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
            
    const CACHE_KEY_RULE_LIST_BY_REPOSITORY_ID = "list_by_repository_id";

    /**
     * @return array
     */
    protected static function getUniqueKeys()
    {
        return ["repository_id","name"];
    }
    /**
     * @return array
     */
    static protected function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_REPOSITORY_ID => ['repository_id'],
        ];
    }
            
	/**
	 * @param int $repositoryId
	 * @return static[]
	 */
	static public function listByRepositoryId($repositoryId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("repository_id = :repository_id:");
		$do->setBind([
			"repository_id" => $repositoryId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_REPOSITORY_ID);
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
            