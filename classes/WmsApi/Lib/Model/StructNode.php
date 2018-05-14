<?php

namespace WmsApi\Lib\Model;

use OK\PhalconEnhance\MvcBase\MptModel;
use WmsApi\Lib\Constant\ServiceName;

class StructNode extends MptModel
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
    protected $root_id;

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
    protected $field_name;

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
     * Method to set the value of field root_id
     *
     * @param integer $root_id
     * @return $this
     */
    public function setRootId($root_id)
    {
        $this->root_id = $root_id;

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
     * Method to set the value of field field_name
     *
     * @param string $field_name
     * @return $this
     */
    public function setFieldName($field_name)
    {
        $this->field_name = $field_name;

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
     * Returns the value of field root_id
     *
     * @return integer
     */
    public function getRootId()
    {
        return $this->root_id;
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
     * Returns the value of field field_name
     *
     * @return string
     */
    public function getFieldName()
    {
        return $this->field_name;
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
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["root_id,depth,field_name"];
    }

    /**
     * @return int
     */
    static protected function getUniqueKeyEncodeWay()
    {
        return parent::CACHE_KEY_ENCODE_BASE64;
    }
            
}
            