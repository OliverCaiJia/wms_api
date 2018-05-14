<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class LogisticOrder extends ModelBase
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
    protected $logistic_company_id;

    /**
     *
     * @var string
     */
    protected $express_sn;

    /**
     *
     * @var string
     */
    protected $consignee_name;

    /**
     *
     * @var integer
     */
    protected $province;

    /**
     *
     * @var integer
     */
    protected $city;

    /**
     *
     * @var integer
     */
    protected $district;

    /**
     *
     * @var string
     */
    protected $consignee_address;

    /**
     *
     * @var string
     */
    protected $phone_number;

    /**
     *
     * @var string
     */
    protected $comment;

    /**
     *
     * @var integer
     */
    protected $is_export;

    /**
     *
     * @var integer
     */
    protected $is_printed;

    /**
     *
     * @var double
     */
    protected $packing_charge;

    /**
     *
     * @var double
     */
    protected $logistic_charge;

    /**
     *
     * @var int
     */
    protected $sync_magento;

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
     * Method to set the value of field logistic_company_id
     *
     * @param integer $logistic_company_id
     * @return $this
     */
    public function setLogisticCompanyId($logistic_company_id)
    {
        $this->logistic_company_id = $logistic_company_id;

        return $this;
    }

    /**
     * Method to set the value of field express_sn
     *
     * @param string $express_sn
     * @return $this
     */
    public function setExpressSn($express_sn)
    {
        $this->express_sn = $express_sn;

        return $this;
    }

    /**
     * Method to set the value of field consignee_name
     *
     * @param string $consignee_name
     * @return $this
     */
    public function setConsigneeName($consignee_name)
    {
        $this->consignee_name = $consignee_name;

        return $this;
    }

    /**
     * Method to set the value of field province
     *
     * @param integer $province
     * @return $this
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Method to set the value of field city
     *
     * @param integer $city
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Method to set the value of field district
     *
     * @param integer $district
     * @return $this
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Method to set the value of field consignee_address
     *
     * @param string $consignee_address
     * @return $this
     */
    public function setConsigneeAddress($consignee_address)
    {
        $this->consignee_address = $consignee_address;

        return $this;
    }

    /**
     * Method to set the value of field phone_number
     *
     * @param string $phone_number
     * @return $this
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    /**
     * Method to set the value of field comment
     *
     * @param string $comment
     * @return $this
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Method to set the value of field is_export
     *
     * @param integer $is_export
     * @return $this
     */
    public function setIsExport($is_export)
    {
        $this->is_export = $is_export;

        return $this;
    }

    /**
     * @param int $is_printed
     * @return LogisticOrder
     */
    public function setIsPrinted($is_printed)
    {
        $this->is_printed = $is_printed;
        return $this;
    }

    /**
     * Method to set the value of field packing_charge
     *
     * @param double $packing_charge
     * @return $this
     */
    public function setPackingCharge($packing_charge)
    {
        $this->packing_charge = $packing_charge;

        return $this;
    }

    /**
     * Method to set the value of field logistic_charge
     *
     * @param double $logistic_charge
     * @return $this
     */
    public function setLogisticCharge($logistic_charge)
    {
        $this->logistic_charge = $logistic_charge;

        return $this;
    }

    /**
     * @param int $sync_magento
     * @return LogisticOrder
     */
    public function setSyncMagento($sync_magento)
    {
        $this->sync_magento = $sync_magento;
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
     * Returns the value of field logistic_company_id
     *
     * @return integer
     */
    public function getLogisticCompanyId()
    {
        return $this->logistic_company_id;
    }

    /**
     * Returns the value of field express_sn
     *
     * @return string
     */
    public function getExpressSn()
    {
        return $this->express_sn;
    }

    /**
     * Returns the value of field consignee_name
     *
     * @return string
     */
    public function getConsigneeName()
    {
        return $this->consignee_name;
    }

    /**
     * Returns the value of field province
     *
     * @return integer
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Returns the value of field city
     *
     * @return integer
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Returns the value of field district
     *
     * @return integer
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Returns the value of field consignee_address
     *
     * @return string
     */
    public function getConsigneeAddress()
    {
        return $this->consignee_address;
    }

    /**
     * Returns the value of field phone_number
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * Returns the value of field comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Returns the value of field is_export
     *
     * @return integer
     */
    public function getIsExport()
    {
        return $this->is_export;
    }

    /**
     * @return int
     */
    public function getIsPrinted()
    {
        return $this->is_printed;
    }

    /**
     * Returns the value of field packing_charge
     *
     * @return double
     */
    public function getPackingCharge()
    {
        return $this->packing_charge;
    }

    /**
     * Returns the value of field logistic_charge
     *
     * @return double
     */
    public function getLogisticCharge()
    {
        return $this->logistic_charge;
    }

    /**
     * @return int
     */
    public function getSyncMagento()
    {
        return $this->sync_magento;
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

    const CACHE_KEY_RULE_LIST_ALL = 'list_all';
                
    const CACHE_KEY_RULE_LIST_BY_LOGISTIC_COMPANY_ID_AND_IS_EXPORT = 'list_by_logistic_company_id_and_is_export';
    const CACHE_KEY_RULE_LIST_BY_IS_EXPORT = 'list_by_is_export';
    const CACHE_KEY_RULE_LIST_BY_STATUS = 'list_wait_by_status';

    /**
     * @return array
     */
    protected static function getUniqueKeys()
    {
        return ['express_sn'];
    }

    /**
     * @return int
     */
    protected static function getUniqueKeyEncodeWay()
    {
        return parent::CACHE_KEY_ENCODE_BASE64;
    }
            
    /**
     * @return array
     */
    protected static function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_LOGISTIC_COMPANY_ID_AND_IS_EXPORT => ['logistic_company_id,is_export'],
            self::CACHE_KEY_RULE_LIST_BY_IS_EXPORT => ['is_export'],
            self::CACHE_KEY_RULE_LIST_BY_STATUS => ['status']


        ];
    }
            
	/**
	 * @param int $logisticCompanyId
	 * @param bool $isExport
	 * @return static[]
	 */
	public static function listByLogisticCompanyIdAndIsExport($logisticCompanyId, $isExport)
	{
		$do = new ModelQueryDO();
		$do->setConditions('logistic_company_id = :logistic_company_id: and is_export = :is_export:');
		$do->setBind([
			'logistic_company_id' => $logisticCompanyId,
			'is_export' => $isExport,
		]);
		$do->setOrderBy('id DESC');
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_LOGISTIC_COMPANY_ID_AND_IS_EXPORT);
		return parent::findUseDO($do);
	}

	/**
	 * @param bool $isExport
	 * @return static[]
	 */
	public static function listByIsExport($isExport)
	{
		$do = new ModelQueryDO();
		$do->setConditions('is_export = :is_export:');
		$do->setBind([
			'is_export' => $isExport,
		]);
		$do->setOrderBy('id DESC');
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_IS_EXPORT);
		return parent::findUseDO($do);
	}

    /**
     * @return static[]
     */
    public static function listNoSyncToMagentoOrder()
    {
        $do = new ModelQueryDO();
        $do->setConditions("express_sn IS NOT NULL and sync_magento = 0 ");
        $do->setOrderBy('id DESC');
        return parent::findUseDO($do);
    }

    /**
     * @return static[]
     */
    public static function listAll()
    {
        $do = new ModelQueryDO();
        $do->setOrderBy('id DESC');
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_ALL);
        return parent::findUseDO($do);
    }

}
            