<?php

namespace WmsApi\Lib\Model;

use OK\PhalconEnhance\MvcBase\MptModel;
use WmsApi\Lib\Constant\ServiceName;

class ProviderApiReturnData extends MptModel
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
    protected $left_value;

    /**
     *
     * @var integer
     */
    protected $right_value;

    /**
     *
     * @var integer
     */
    protected $depth;

    /**
     *
     * @var string
     */
    protected $var_key;

    /**
     *
     * @var string
     */
    protected $data_type;

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
     * Method to set the value of field left_value
     *
     * @param integer $left_value
     * @return $this
     */
    public function setLeftValue($left_value)
    {
        $this->left_value = $left_value;

        return $this;
    }

    /**
     * Method to set the value of field right_value
     *
     * @param integer $right_value
     * @return $this
     */
    public function setRightValue($right_value)
    {
        $this->right_value = $right_value;

        return $this;
    }

    /**
     * Method to set the value of field depth
     *
     * @param integer $depth
     * @return $this
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;

        return $this;
    }

    /**
     * Method to set the value of field var_key
     *
     * @param string $var_key
     * @return $this
     */
    public function setVarKey($var_key)
    {
        $this->var_key = $var_key;

        return $this;
    }

    /**
     * Method to set the value of field data_type
     *
     * @param string $data_type
     * @return $this
     */
    public function setDataType($data_type)
    {
        $this->data_type = $data_type;

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
     * Returns the value of field left_value
     *
     * @return integer
     */
    public function getLeftValue()
    {
        return $this->left_value;
    }

    /**
     * Returns the value of field right_value
     *
     * @return integer
     */
    public function getRightValue()
    {
        return $this->right_value;
    }

    /**
     * Returns the value of field depth
     *
     * @return integer
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * Returns the value of field var_key
     *
     * @return string
     */
    public function getVarKey()
    {
        return $this->var_key;
    }

    /**
     * Returns the value of field data_type
     *
     * @return string
     */
    public function getDataType()
    {
        return $this->data_type;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        parent::initialize();
        $this->setConnectionService(ServiceName::DB_WMS);
    }

    /**
     * @return string
     */
    static protected function getFieldNameOfRootId()
    {
        return "provider_api_id";
    }

    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["provider_api_id,left_value","provider_api_id,right_value"];
    }

    /**
     * @return int
     */
    static protected function getUniqueKeyEncodeWay()
    {
        return parent::CACHE_KEY_ENCODE_BASE64;
    }
}
            