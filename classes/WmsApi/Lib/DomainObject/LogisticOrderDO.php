<?php

namespace WmsApi\Lib\DomainObject;


use WmsApi\Lib\Model\LogisticOrder;
use WmsApi\Lib\Model\UsableLogisticCompany;

class LogisticOrderDO
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $logisticCompanyCode;

    /**
     * @var string
     */
    public $logisticSn;

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
     * @return string
     */
    public function getLogisticCompanyCode()
    {
        return $this->logisticCompanyCode;
    }

    /**
     * @param string $logisticCompanyCode
     */
    public function setLogisticCompanyCode($logisticCompanyCode)
    {
        $this->logisticCompanyCode = $logisticCompanyCode;
    }

    /**
     * @return string
     */
    public function getLogisticSn()
    {
        return $this->logisticSn;
    }

    /**
     * @param string $logisticSn
     */
    public function setLogisticSn($logisticSn)
    {
        $this->logisticSn = $logisticSn;
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
     */
    public function setConsigneeName($consigneeName)
    {
        $this->consigneeName = $consigneeName;
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
     */
    public function setProvince($province)
    {
        $this->province = $province;
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
     */
    public function setCity($city)
    {
        $this->city = $city;
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
     */
    public function setDistrict($district)
    {
        $this->district = $district;
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
     */
    public function setConsigneeAddress($consigneeAddress)
    {
        $this->consigneeAddress = $consigneeAddress;
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
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * LogisticOrderGoodsDO constructor.
     * @param LogisticOrder $logisticOrder
     * @param UsableLogisticCompany $usableLogisticCompany
     */
    public function __construct(LogisticOrder $logisticOrder, UsableLogisticCompany $usableLogisticCompany)
    {
        $this->setId($logisticOrder->getId());
        $this->setLogisticSn($logisticOrder->getId());
        $this->setConsigneeName($logisticOrder->getConsigneeName());
        $this->setPhoneNumber($logisticOrder->getPhoneNumber());
        $this->setProvince($logisticOrder->getProvince());
        $this->setCity($logisticOrder->getCity());
        $this->setDistrict($logisticOrder->getDistrict());
        $this->setConsigneeAddress($logisticOrder->getConsigneeAddress());
        $this->setLogisticCompanyCode(strtoupper($usableLogisticCompany->getCode()));
    }
}