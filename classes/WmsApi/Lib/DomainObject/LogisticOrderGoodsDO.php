<?php

/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/5/3
 * Time: 下午4:25
 */

namespace WmsApi\Lib\DomainObject;



use WmsApi\Lib\Model\PickOrderGoods;
use WmsApi\Lib\Model\SellerGoods;

class LogisticOrderGoodsDO
{
    /**
     * @var int
     */
    public $goodsId;

    /**
     * @var int
     */
    public $goodsNumber;

    /**
     * @var string
     */
    public $goodsName;

    /**
     * @var string
     */
    public $abbrName;

    /**
     * @return int
     */
    public function getGoodsId()
    {
        return $this->goodsId;
    }

    /**
     * @param int $goodsId
     */
    public function setGoodsId($goodsId)
    {
        $this->goodsId = $goodsId;
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
    public function getGoodsName()
    {
        return $this->goodsName;
    }

    /**
     * @param string $goodsName
     */
    public function setGoodsName($goodsName)
    {
        $this->goodsName = $goodsName;
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
     * LogisticOrderGoodsDO constructor.
     * @param PickOrderGoods $pickOrderGoods
     * @param SellerGoods $sellerGoods
     */
    public function __construct(PickOrderGoods $pickOrderGoods, SellerGoods $sellerGoods)
    {
        $this->setGoodsId($pickOrderGoods->getSellerGoodsId());
        $this->setGoodsNumber($pickOrderGoods->getGoodsNumber());
        $this->setGoodsName($sellerGoods->getName());
        $this->setAbbrName($sellerGoods->getAbbrName());
    }
}