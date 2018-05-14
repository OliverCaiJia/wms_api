<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class InventoryTransfer extends ModelBase
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
    protected $request_seller;

    /**
     *
     * @var integer
     */
    protected $response_seller;

    /**
     *
     * @var string
     */
    protected $voucher;

    /**
     *
     * @var integer
     */
    protected $status;

    /**
     *
     * @var integer
     */
    protected $operator;

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
     * Method to set the value of field request_seller
     *
     * @param integer $request_seller
     * @return $this
     */
    public function setRequestSeller($request_seller)
    {
        $this->request_seller = $request_seller;

        return $this;
    }

    /**
     * Method to set the value of field response_seller
     *
     * @param integer $response_seller
     * @return $this
     */
    public function setResponseSeller($response_seller)
    {
        $this->response_seller = $response_seller;

        return $this;
    }

    /**
     * Method to set the value of field voucher
     *
     * @param string $voucher
     * @return $this
     */
    public function setVoucher($voucher)
    {
        $this->voucher = $voucher;

        return $this;
    }

    /**
     * Method to set the value of field status
     *
     * @param integer $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Method to set the value of field operator
     *
     * @param integer $operator
     * @return $this
     */
    public function setOperator($operator)
    {
        $this->operator = $operator;

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
     * Returns the value of field request_seller
     *
     * @return integer
     */
    public function getRequestSeller()
    {
        return $this->request_seller;
    }

    /**
     * Returns the value of field response_seller
     *
     * @return integer
     */
    public function getResponseSeller()
    {
        return $this->response_seller;
    }

    /**
     * Returns the value of field voucher
     *
     * @return string
     */
    public function getVoucher()
    {
        return $this->voucher;
    }

    /**
     * Returns the value of field status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Returns the value of field operator
     *
     * @return integer
     */
    public function getOperator()
    {
        return $this->operator;
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
                
    const CACHE_KEY_RULE_LIST_BY_RESPONSE_SELLER = "list_by_response_seller";    
    const CACHE_KEY_RULE_LIST_BY_REQUEST_SELLER = "list_by_request_seller";
    /**
     * @return array
     */
    static protected function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_RESPONSE_SELLER => ['response_seller'],
            self::CACHE_KEY_RULE_LIST_BY_REQUEST_SELLER => ['request_seller'],
        ];
    }
            
	/**
	 * @param int $responseSeller
	 * @return static[]
	 */
	static public function listByResponseSeller($responseSeller)
	{
		$do = new ModelQueryDO();
		$do->setConditions("response_seller = :response_seller:");
		$do->setBind([
			"response_seller" => $responseSeller,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_RESPONSE_SELLER);
		return parent::findUseDO($do);
	}

	/**
	 * @param int $requestSeller
	 * @return static[]
	 */
	static public function listByRequestSeller($requestSeller)
	{
		$do = new ModelQueryDO();
		$do->setConditions("request_seller = :request_seller:");
		$do->setBind([
			"request_seller" => $requestSeller,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_REQUEST_SELLER);
		return parent::findUseDO($do);
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
            