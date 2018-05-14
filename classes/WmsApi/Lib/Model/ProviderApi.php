<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class ProviderApi extends ModelBase
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
    protected $api_id;

    /**
     *
     * @var integer
     */
    protected $provider_id;

    /**
     *
     * @var string
     */
    protected $action;

    /**
     *
     * @var string
     */
    protected $hostname;

    /**
     *
     * @var string
     */
    protected $filename;

    /**
     *
     * @var string
     */
    protected $version;

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
     * Method to set the value of field api_id
     *
     * @param integer $api_id
     * @return $this
     */
    public function setApiId($api_id)
    {
        $this->api_id = $api_id;

        return $this;
    }

    /**
     * Method to set the value of field provider_id
     *
     * @param integer $provider_id
     * @return $this
     */
    public function setProviderId($provider_id)
    {
        $this->provider_id = $provider_id;

        return $this;
    }

    /**
     * Method to set the value of field action
     *
     * @param string $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Method to set the value of field hostname
     *
     * @param string $hostname
     * @return $this
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * Method to set the value of field filename
     *
     * @param string $filename
     * @return $this
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Method to set the value of field version
     *
     * @param string $version
     * @return $this
     */
    public function setVersion($version)
    {
        $this->version = $version;

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
     * Returns the value of field api_id
     *
     * @return integer
     */
    public function getApiId()
    {
        return $this->api_id;
    }

    /**
     * Returns the value of field provider_id
     *
     * @return integer
     */
    public function getProviderId()
    {
        return $this->provider_id;
    }

    /**
     * Returns the value of field action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Returns the value of field hostname
     *
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Returns the value of field filename
     *
     * @return string
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Returns the value of field version
     *
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
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
                
    const CACHE_KEY_RULE_LIST_BY_API_ID = "list_by_api_id";
                
    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["api_id,provider_id"];
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
            self::CACHE_KEY_RULE_LIST_BY_API_ID => ['api_id'],
        ];
    }
            
	/**
	 * @param int $apiId
	 * @return static[]
	 */
	static public function listByApiId($apiId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("api_id = :api_id:");
		$do->setBind([
			"api_id" => $apiId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_API_ID);
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
            