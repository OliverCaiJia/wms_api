<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class ApiReturnData extends ModelBase
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
    protected $provider_api_id;

    /**
     *
     * @var integer
     */
    protected $api_return_data_map_id;

    /**
     *
     * @var integer
     */
    protected $provider_api_return_data_id;

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
     * Method to set the value of field provider_api_id
     *
     * @param integer $provider_api_id
     * @return $this
     */
    public function setProviderApiId($provider_api_id)
    {
        $this->provider_api_id = $provider_api_id;

        return $this;
    }

    /**
     * Method to set the value of field api_return_data_map_id
     *
     * @param integer $api_return_data_map_id
     * @return $this
     */
    public function setApiReturnDataMapId($api_return_data_map_id)
    {
        $this->api_return_data_map_id = $api_return_data_map_id;

        return $this;
    }

    /**
     * Method to set the value of field provider_api_return_data_id
     *
     * @param integer $provider_api_return_data_id
     * @return $this
     */
    public function setProviderApiReturnDataId($provider_api_return_data_id)
    {
        $this->provider_api_return_data_id = $provider_api_return_data_id;

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
     * Returns the value of field provider_api_id
     *
     * @return integer
     */
    public function getProviderApiId()
    {
        return $this->provider_api_id;
    }

    /**
     * Returns the value of field api_return_data_map_id
     *
     * @return integer
     */
    public function getApiReturnDataMapId()
    {
        return $this->api_return_data_map_id;
    }

    /**
     * Returns the value of field provider_api_return_data_id
     *
     * @return integer
     */
    public function getProviderApiReturnDataId()
    {
        return $this->provider_api_return_data_id;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setConnectionService(ServiceName::DB_WMS);
    }

    const CACHE_KEY_RULE_LIST_BY_PROVIDER_API_ID = "list_by_provider_api_id";
    const CACHE_KEY_RULE_LIST_BY_API_RETURN_DATA_MAP_ID = "list_by_api_return_data_map_id";

    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["provider_api_id,api_return_data_map_id"];
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
            self::CACHE_KEY_RULE_LIST_BY_PROVIDER_API_ID => ['provider_api_id'],
            self::CACHE_KEY_RULE_LIST_BY_API_RETURN_DATA_MAP_ID => ['api_return_data_map_id']
        ];
    }

    /**
     * @param int $providerApiId
     * @return static[]
     */
    static public function listByProviderApiId($providerApiId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("provider_api_id = :provider_api_id:");
        $do->setBind([
            "provider_api_id" => $providerApiId,
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_PROVIDER_API_ID);
        return parent::findUseDO($do);
    }

    /**
     * @param int $apiReturnDataMapId
     * @return static[]
     */
    static public function listByApiReturnDataMapId($apiReturnDataMapId)
    {
        $do = new ModelQueryDO();
        $do->setConditions("api_return_data_map_id = :api_return_data_map_id:");
        $do->setBind([
            "api_return_data_map_id" => $apiReturnDataMapId,
        ]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_API_RETURN_DATA_MAP_ID);
        return parent::findUseDO($do);
    }
}
