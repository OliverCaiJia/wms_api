<?php

namespace WmsApi\Lib\DomainObject;


use WmsApi\Lib\Model\LogisticOrder;
use WmsApi\Lib\Model\PickOrder;

class PickOrderJoinLogisticOrderDO
{
    /**
     * @var int
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $sellerId;

    /**
     *
     * @var integer
     */
    public $pickerId;

    /**
     *
     * @var integer
     */
    public $logisticOrderId;

    /**
     *
     * @var integer
     */
    public $sellerGoodsId;

    /**
     *
     * @var integer
     */
    public $packOrderId;

    /**
     *
     * @var integer
     */
    public $auditorId;

    /**
     *
     * @var integer
     */
    public $status;

    /**
     *
     * @var integer
     */
    public $logisticCompanyId;

    /**
     *
     * @var string
     */
    public $expressSn;

    /**
     *
     * @var integer
     */
    public $containerId;

    /**
     *
     * @var double
     */
    public $totalWeight;

    /**
     * @var bool
     */
    public $printable;

    /**
     * @var bool
     */
    public $isPrepack;

    /**
     * @var string
     */
    public $consigneeName;

    /**
     * @var string
     */
    public $province;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $district;

    /**
     * @var string
     */
    public $consigneeAddress;

    /**
     * @var string
     */
    public $phoneNumber;

    /**
     * @var string
     */
    public $comment;

    /**
     *
     * @var integer
     */
    public $isExport;

    /**
     *
     * @var integer
     */
    public $isPrinted;

    /**
     *
     * @var double
     */
    public $packingCharge;

    /**
     *
     * @var double
     */
    public $logisticCharge;

    /**
     *
     * @var string
     */
    public $created;

    /**
     *
     * @var string
     */
    public $modified;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * @param int $sellerId
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPickerId()
    {
        return $this->pickerId;
    }

    /**
     * @param int $pickerId
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setPickerId($pickerId)
    {
        $this->pickerId = $pickerId;
        return $this;
    }

    /**
     * @return int
     */
    public function getLogisticOrderId()
    {
        return $this->logisticOrderId;
    }

    /**
     * @param int $logisticOrderId
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setLogisticOrderId($logisticOrderId)
    {
        $this->logisticOrderId = $logisticOrderId;
        return $this;
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
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setSellerGoodsId($sellerGoodsId)
    {
        $this->sellerGoodsId = $sellerGoodsId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPackOrderId()
    {
        return $this->packOrderId;
    }

    /**
     * @param int $packOrderId
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setPackOrderId($packOrderId)
    {
        $this->packOrderId = $packOrderId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuditorId()
    {
        return $this->auditorId;
    }

    /**
     * @param int $auditorId
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setAuditorId($auditorId)
    {
        $this->auditorId = $auditorId;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int
     */
    public function getLogisticCompanyId()
    {
        return $this->logisticCompanyId;
    }

    /**
     * @param int $logisticCompanyId
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setLogisticCompanyId($logisticCompanyId)
    {
        $this->logisticCompanyId = $logisticCompanyId;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpressSn()
    {
        return $this->expressSn;
    }

    /**
     * @param string $expressSn
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setExpressSn($expressSn)
    {
        $this->expressSn = $expressSn;
        return $this;
    }

    /**
     * @return int
     */
    public function getContainerId()
    {
        return $this->containerId;
    }

    /**
     * @param int $containerId
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setContainerId($containerId)
    {
        $this->containerId = $containerId;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalWeight()
    {
        return $this->totalWeight;
    }

    /**
     * @param float $totalWeight
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setTotalWeight($totalWeight)
    {
        $this->totalWeight = $totalWeight;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPrintable()
    {
        return $this->printable;
    }

    /**
     * @param bool $printable
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setPrintable($printable)
    {
        $this->printable = $printable;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPrepack()
    {
        return $this->isPrepack;
    }

    /**
     * @param bool $isPrepack
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setIsPrepack($isPrepack)
    {
        $this->isPrepack = $isPrepack;
        return $this;
    }

    /**
     * @return string
     */
    public function getConsigneeName()
    {
        return $this->consigneeName;
    }

    /**
     * @param string $consigneeName
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setConsigneeName($consigneeName)
    {
        $this->consigneeName = $consigneeName;
        return $this;
    }

    /**
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * @param string $province
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setProvince($province)
    {
        $this->province = $province;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param string $district
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setDistrict($district)
    {
        $this->district = $district;
        return $this;
    }

    /**
     * @return string
     */
    public function getConsigneeAddress()
    {
        return $this->consigneeAddress;
    }

    /**
     * @param string $consigneeAddress
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setConsigneeAddress($consigneeAddress)
    {
        $this->consigneeAddress = $consigneeAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsExport()
    {
        return $this->isExport;
    }

    /**
     * @param int $isExport
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setIsExport($isExport)
    {
        $this->isExport = $isExport;
        return $this;
    }

    /**
     * @return int
     */
    public function getIsPrinted()
    {
        return $this->isPrinted;
    }

    /**
     * @param int $isPrinted
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setIsPrinted($isPrinted)
    {
        $this->isPrinted = $isPrinted;
        return $this;
    }

    /**
     * @return float
     */
    public function getPackingCharge()
    {
        return $this->packingCharge;
    }

    /**
     * @param float $packingCharge
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setPackingCharge($packingCharge)
    {
        $this->packingCharge = $packingCharge;
        return $this;
    }

    /**
     * @return float
     */
    public function getLogisticCharge()
    {
        return $this->logisticCharge;
    }

    /**
     * @param float $logisticCharge
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setLogisticCharge($logisticCharge)
    {
        $this->logisticCharge = $logisticCharge;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param string $created
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param string $modified
     * @return PickOrderJoinLogisticOrderDO
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
        return $this;
    }

    /**
     * PickOrderJoinLogisticOrderDO constructor.
     * @param PickOrder $pickOrder
     * @param LogisticOrder $logisticOrder
     */
    public function __construct(PickOrder $pickOrder ,LogisticOrder $logisticOrder)
    {
        if ((int)$pickOrder->getLogisticOrderId() === (int)$logisticOrder->getId())
        {
            /* Pick order*/
            $this->setId($pickOrder->getId());
            $this->setSellerId($pickOrder->getSellerId());
            $this->setStatus($pickOrder->getStatus());
            $this->setSellerGoodsId($pickOrder->getSellerGoodsId());
            $this->setAuditorId($pickOrder->getAuditorId());
            $this->setPickerId($pickOrder->getPickerId());
            $this->setPackOrderId($pickOrder->getPackOrderId());
            $this->setContainerId($pickOrder->getContainerId());
            $this->setTotalWeight($pickOrder->getTotalWeight());
            $this->setPrintable($pickOrder->getPrintable());
            $this->setIsPrepack($pickOrder->getIsPrepack());

            /* Logistic order*/
            $this->setLogisticOrderId($logisticOrder->getId());
            $this->setLogisticCompanyId($logisticOrder->getLogisticCompanyId());
            $this->setExpressSn($logisticOrder->getExpressSn());
            $this->setConsigneeName($logisticOrder->getConsigneeName());
            $this->setPhoneNumber($logisticOrder->getPhoneNumber());
            $this->setProvince($logisticOrder->getProvince());
            $this->setCity($logisticOrder->getCity());
            $this->setDistrict($logisticOrder->getDistrict());
            $this->setConsigneeAddress($logisticOrder->getConsigneeAddress());
            $this->setComment($logisticOrder->getComment());
            $this->setIsExport($logisticOrder->getIsExport());
            $this->setIsPrinted($logisticOrder->getIsPrinted());
            $this->setLogisticCharge($logisticOrder->getLogisticCharge());
            $this->setPackingCharge($logisticOrder->getPackingCharge());

            $this->setCreated($pickOrder->getCreated());
            $this->setModified($pickOrder->getModified());
            if (strtotime($logisticOrder->getModified()) > strtotime($pickOrder->getModified()) ) {
                $this->setModified($logisticOrder->getModified());
            }
        }

    }
}