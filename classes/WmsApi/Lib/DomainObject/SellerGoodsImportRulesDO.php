<?php

namespace WmsApi\Lib\DomainObject;


use OK\Util\ObjectUtil;

class SellerGoodsImportRulesDO
{
    /**
     * @var string
     */
    public $bar_code;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $abbr_name;

    /**
     * @var string
     */
    public $is_combo;

    /**
     * @var string
     */
    public $length;

    /**
     * @var string
     */
    public $width;

    /**
     * @var string
     */
    public $height;

    /**
     * @var string
     */
    public $weight;

    /**
     * @var string
     */
    public $prepack_weight;

    /**
     * @return string
     */
    public function getBarCode()
    {
        return $this->bar_code;
    }

    /**
     * @param string $bar_code
     * @return SellerGoodsImportRulesDO
     */
    public function setBarCode($bar_code)
    {
        $this->bar_code = $bar_code;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return SellerGoodsImportRulesDO
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAbbrName()
    {
        return $this->abbr_name;
    }

    /**
     * @param string $abbr_name
     * @return SellerGoodsImportRulesDO
     */
    public function setAbbrName($abbr_name)
    {
        $this->abbr_name = $abbr_name;
        return $this;
    }

    /**
     * @return string
     */
    public function isCombo()
    {
        return $this->is_combo;
    }

    /**
     * @param string $is_combo
     * @return SellerGoodsImportRulesDO
     */
    public function setIsCombo($is_combo)
    {
        $this->is_combo = $is_combo;
        return $this;
    }

    /**
     * @return string
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param string $length
     * @return SellerGoodsImportRulesDO
     */
    public function setLength($length)
    {
        $this->length = $length;
        return $this;
    }

    /**
     * @return string
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param string $width
     * @return SellerGoodsImportRulesDO
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param string $height
     * @return SellerGoodsImportRulesDO
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     * @return SellerGoodsImportRulesDO
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrepackWeight()
    {
        return $this->prepack_weight;
    }

    /**
     * @param string $prepack_weight
     * @return SellerGoodsImportRulesDO
     */
    public function setPrepackWeight($prepack_weight)
    {
        $this->prepack_weight = $prepack_weight;
        return $this;
    }

    /**
     * OrderImportRulesDO constructor.
     * @param array $importRules
     */
    public function __construct($importRules)
    {
        foreach ($importRules as $key =>$rule) {
            ObjectUtil::setObjPropDyn($this, $key, $rule);
        }
    }
}