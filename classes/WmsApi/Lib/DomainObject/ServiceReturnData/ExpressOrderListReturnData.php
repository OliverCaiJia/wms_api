<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/5/31
 * Time: 下午4:17
 */

namespace WmsApi\Lib\DomainObject\ServiceReturnData;


use OK\PhpEnhance\DomainObject\ServiceReturnDataDO;

class ExpressOrderListReturnData extends ServiceReturnDataDO
{
    /**
     * @var string
     */
    protected $logisticCode;

    /**
     * @var string
     */
    protected $expressSn;

    /**
     * @var string
     */
    protected $markDestination;

    /**
     * @var string
     */
    protected $originCode;

    /**
     * @var string
     */
    protected $originName;

    /**
     * @var string
     */
    protected $destinationCode;

    /**
     * @var string
     */
    protected $destinationName;

    /**
     * @var string
     */
    protected $sortingCode;

    /**
     * @var string
     */
    protected $consigneeName;

    /**
     * @var string
     */
    protected $consigneePhone;

    /**
     * @var int
     */
    protected $consigneeProvince;

    /**
     * @var int
     */
    protected $consigneeCity;

    /**
     * @var int
     */
    protected $consigneeDistrict;

    /**
     * @var string
     */
    protected $consigneeAddress;

    /**
     * @var string
     */
    protected $senderName;

    /**
     * @var string
     */
    protected $senderPhone;

    /**
     * @var int
     */
    protected $senderProvince;

    /**
     * @var int
     */
    protected $senderCity;

    /**
     * @var int
     */
    protected $senderDistrict;

    /**
     * @var string
     */
    protected $senderAddress;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @return string
     */
    public function getLogisticCode()
    {
        return $this->logisticCode;
    }

    /**
     * @param string $logisticCode
     */
    public function setLogisticCode($logisticCode)
    {
        $this->logisticCode = $logisticCode;
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
     */
    public function setExpressSn($expressSn)
    {
        $this->expressSn = $expressSn;
    }

    /**
     * @return string
     */
    public function getMarkDestination()
    {
        return $this->markDestination;
    }

    /**
     * @param string $markDestination
     */
    public function setMarkDestination($markDestination)
    {
        $this->markDestination = $markDestination;
    }

    /**
     * @return string
     */
    public function getOriginCode()
    {
        return $this->originCode;
    }

    /**
     * @param string $originCode
     */
    public function setOriginCode($originCode)
    {
        $this->originCode = $originCode;
    }

    /**
     * @return string
     */
    public function getOriginName()
    {
        return $this->originName;
    }

    /**
     * @param string $originName
     */
    public function setOriginName($originName)
    {
        $this->originName = $originName;
    }

    /**
     * @return string
     */
    public function getDestinationCode()
    {
        return $this->destinationCode;
    }

    /**
     * @param string $destinationCode
     */
    public function setDestinationCode($destinationCode)
    {
        $this->destinationCode = $destinationCode;
    }

    /**
     * @return string
     */
    public function getDestinationName()
    {
        return $this->destinationName;
    }

    /**
     * @param string $destinationName
     */
    public function setDestinationName($destinationName)
    {
        $this->destinationName = $destinationName;
    }

    /**
     * @return string
     */
    public function getSortingCode()
    {
        return $this->sortingCode;
    }

    /**
     * @param string $sortingCode
     */
    public function setSortingCode($sortingCode)
    {
        $this->sortingCode = $sortingCode;
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
    public function getConsigneePhone()
    {
        return $this->consigneePhone;
    }

    /**
     * @param string $consigneePhone
     */
    public function setConsigneePhone($consigneePhone)
    {
        $this->consigneePhone = $consigneePhone;
    }

    /**
     * @return int
     */
    public function getConsigneeProvince()
    {
        return $this->consigneeProvince;
    }

    /**
     * @param int $consigneeProvince
     */
    public function setConsigneeProvince($consigneeProvince)
    {
        $this->consigneeProvince = $consigneeProvince;
    }

    /**
     * @return int
     */
    public function getConsigneeCity()
    {
        return $this->consigneeCity;
    }

    /**
     * @param int $consigneeCity
     */
    public function setConsigneeCity($consigneeCity)
    {
        $this->consigneeCity = $consigneeCity;
    }

    /**
     * @return int
     */
    public function getConsigneeDistrict()
    {
        return $this->consigneeDistrict;
    }

    /**
     * @param int $consigneeDistrict
     */
    public function setConsigneeDistrict($consigneeDistrict)
    {
        $this->consigneeDistrict = $consigneeDistrict;
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
    public function getSenderName()
    {
        return $this->senderName;
    }

    /**
     * @param string $senderName
     */
    public function setSenderName($senderName)
    {
        $this->senderName = $senderName;
    }

    /**
     * @return string
     */
    public function getSenderPhone()
    {
        return $this->senderPhone;
    }

    /**
     * @param string $senderPhone
     */
    public function setSenderPhone($senderPhone)
    {
        $this->senderPhone = $senderPhone;
    }

    /**
     * @return int
     */
    public function getSenderProvince()
    {
        return $this->senderProvince;
    }

    /**
     * @param int $senderProvince
     */
    public function setSenderProvince($senderProvince)
    {
        $this->senderProvince = $senderProvince;
    }

    /**
     * @return int
     */
    public function getSenderCity()
    {
        return $this->senderCity;
    }

    /**
     * @param int $senderCity
     */
    public function setSenderCity($senderCity)
    {
        $this->senderCity = $senderCity;
    }

    /**
     * @return int
     */
    public function getSenderDistrict()
    {
        return $this->senderDistrict;
    }

    /**
     * @param int $senderDistrict
     */
    public function setSenderDistrict($senderDistrict)
    {
        $this->senderDistrict = $senderDistrict;
    }

    /**
     * @return string
     */
    public function getSenderAddress()
    {
        return $this->senderAddress;
    }

    /**
     * @param string $senderAddress
     */
    public function setSenderAddress($senderAddress)
    {
        $this->senderAddress = $senderAddress;
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
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
}