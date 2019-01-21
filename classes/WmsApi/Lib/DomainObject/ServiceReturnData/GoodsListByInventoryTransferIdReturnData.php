<?php

namespace WmsApi\Lib\DomainObject\ServiceReturnData;


use OK\PhpEnhance\DomainObject\ServiceReturnDataDO;

class GoodsListByInventoryTransferIdReturnData extends ServiceReturnDataDO
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var int
     */
    protected $sellerGoodsId;

    /**
     * @var int
     */
    protected $goodsNumber;

    /**
     * @var string
     */
    protected $encodeType;

    /**
     * @var string
     */
    protected $shelfLocation;

    /**
     * @var string
     */
    protected $barCode;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $abbrName;

    /**
     * @var string
     */
    protected $image;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getSellerGoodsId()
    {
        return $this->sellerGoodsId;
    }

    /**
     * @param int $sellerGoodsId
     */
    public function setSellerGoodsId($sellerGoodsId)
    {
        $this->sellerGoodsId = $sellerGoodsId;
    }

    /**
     * @return int
     */
    public function getGoodsNumber()
    {
        return $this->goodsNumber;
    }

    /**
     * @param int $goodsNumber
     */
    public function setGoodsNumber($goodsNumber)
    {
        $this->goodsNumber = $goodsNumber;
    }

    /**
     * @return string
     */
    public function getEncodeType()
    {
        return $this->encodeType;
    }

    /**
     * @param string $encodeType
     */
    public function setEncodeType($encodeType)
    {
        $this->encodeType = $encodeType;
    }

    /**
     * @return string
     */
    public function getShelfLocation()
    {
        return $this->shelfLocation;
    }

    /**
     * @param string $shelfLocation
     */
    public function setShelfLocation($shelfLocation)
    {
        $this->shelfLocation = $shelfLocation;
    }

    /**
     * @return string
     */
    public function getBarCode()
    {
        return $this->barCode;
    }

    /**
     * @param string $barCode
     */
    public function setBarCode($barCode)
    {
        $this->barCode = $barCode;
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
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAbbrName()
    {
        return $this->abbrName;
    }

    /**
     * @param string $abbrName
     */
    public function setAbbrName($abbrName)
    {
        $this->abbrName = $abbrName;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }
}