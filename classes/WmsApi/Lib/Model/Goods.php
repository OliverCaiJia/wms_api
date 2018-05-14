<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class Goods extends ModelBase
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
    protected $bar_code;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $abbr_name;

    /**
     *
     * @var integer
     */
    protected $length;

    /**
     *
     * @var integer
     */
    protected $width;

    /**
     *
     * @var integer
     */
    protected $height;

    /**
     *
     * @var double
     */
    protected $weight;

    /**
     *
     * @var string
     */
    protected $logistic_require;

    /**
     *
     * @var string
     */
    protected $image;

    /**
     *
     * @var integer
     */
    protected $is_own_box;

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
     * Method to set the value of field bar_code
     *
     * @param string $bar_code
     * @return $this
     */
    public function setBarCode($bar_code)
    {
        $this->bar_code = $bar_code;

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
     * Method to set the value of field abbr_name
     *
     * @param string $abbr_name
     * @return $this
     */
    public function setAbbrName($abbr_name)
    {
        $this->abbr_name = $abbr_name;

        return $this;
    }

    /**
     * Method to set the value of field length
     *
     * @param integer $length
     * @return $this
     */
    public function setLength($length)
    {
        $this->length = $length;

        return $this;
    }

    /**
     * Method to set the value of field width
     *
     * @param integer $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Method to set the value of field height
     *
     * @param integer $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Method to set the value of field weight
     *
     * @param double $weight
     * @return $this
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Method to set the value of field logistic_require
     *
     * @param string $logistic_require
     * @return $this
     */
    public function setLogisticRequire($logistic_require)
    {
        $this->logistic_require = $logistic_require;

        return $this;
    }

    /**
     * Method to set the value of field image
     *
     * @param string $image
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Method to set the value of field is_own_box
     *
     * @param bool $is_own_box
     * @return $this
     */
    public function setIsOwnBox($is_own_box)
    {
        $this->is_own_box = (int)$is_own_box;

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
     * Returns the value of field bar_code
     *
     * @return string
     */
    public function getBarCode()
    {
        return $this->bar_code;
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
     * Returns the value of field abbr_name
     *
     * @return string
     */
    public function getAbbrName()
    {
        return $this->abbr_name;
    }

    /**
     * Returns the value of field length
     *
     * @return integer
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Returns the value of field width
     *
     * @return integer
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Returns the value of field height
     *
     * @return integer
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Returns the value of field weight
     *
     * @return double
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Returns the value of field logistic_require
     *
     * @return string
     */
    public function getLogisticRequire()
    {
        return $this->logistic_require;
    }

    /**
     * Returns the value of field image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Returns the value of field is_own_box
     *
     * @return bool
     */
    public function getIsOwnBox()
    {
        return (bool)$this->is_own_box;
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


    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["bar_code","name","abbr_name"];
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
}
            