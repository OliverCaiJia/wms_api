<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class Member extends ModelBase
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
    protected $job_number;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $real_name;

    /**
     *
     * @var string
     */
    protected $mobile_phone;

    /**
     *
     * @var string
     */
    protected $password;

    /**
     *
     * @var string
     */
    protected $salt;

    /**
     *
     * @var integer
     */
    protected $seller_id;

    /**
     *
     * @var boolean
     */
    protected $is_seller_member;

    /**
     *
     * @var boolean
     */
    protected $disabled;

    /**
     *
     * @var string
     */
    protected $last_login;

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
     * Method to set the value of field job_number
     *
     * @param string $job_number
     * @return $this
     */
    public function setJobNumber($job_number)
    {
        $this->job_number = $job_number;

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
     * Method to set the value of field real_name
     *
     * @param string $real_name
     * @return $this
     */
    public function setRealName($real_name)
    {
        $this->real_name = $real_name;

        return $this;
    }

    /**
     * Method to set the value of field mobile_phone
     *
     * @param string $mobile_phone
     * @return $this
     */
    public function setMobilePhone($mobile_phone)
    {
        $this->mobile_phone = $mobile_phone;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Method to set the value of field salt
     *
     * @param string $salt
     * @return $this
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Method to set the value of field seller_id
     *
     * @param integer $seller_id
     * @return $this
     */
    public function setSellerId($seller_id)
    {
        $this->seller_id = $seller_id;

        return $this;
    }

    /**
     * Method to set the value of field is_seller_member
     *
     * @param boolean $is_seller_member
     * @return $this
     */
    public function setIsSellerMember($is_seller_member)
    {
        $this->is_seller_member = (int)$is_seller_member;

        return $this;
    }

    /**
     * Method to set the value of field disabled
     *
     * @param boolean $disabled
     * @return $this
     */
    public function setDisabled($disabled)
    {
        $this->disabled = (int)$disabled;

        return $this;
    }

    /**
     * Method to set the value of field last_login
     *
     * @param string $last_login
     * @return $this
     */
    public function setLastLogin($last_login)
    {
        $this->last_login = $last_login;

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
     * Returns the value of field job_number
     *
     * @return string
     */
    public function getJobNumber()
    {
        return $this->job_number;
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
     * Returns the value of field real_name
     *
     * @return string
     */
    public function getRealName()
    {
        return $this->real_name;
    }

    /**
     * Returns the value of field mobile_phone
     *
     * @return string
     */
    public function getMobilePhone()
    {
        return $this->mobile_phone;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Returns the value of field seller_id
     *
     * @return integer
     */
    public function getSellerId()
    {
        return $this->seller_id;
    }

    /**
     * Returns the value of field is_seller_member
     *
     * @return boolean
     */
    public function getIsSellerMember()
    {
        return (bool)$this->is_seller_member;
    }

    /**
     * Returns the value of field disabled
     *
     * @return boolean
     */
    public function getDisabled()
    {
        return (bool)$this->disabled;
    }

    /**
     * Returns the value of field last_login
     *
     * @return string
     */
    public function getLastLogin()
    {
        return $this->last_login;
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
                
    const CACHE_KEY_RULE_LIST_BY_SELLER_ID = "list_by_seller_id";
    const CACHE_KEY_RULE_LIST_BY_IS_SELLER_MEMBER = "list_by_is_seller_member";
                
    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["job_number","name","mobile_phone"];
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
            self::CACHE_KEY_RULE_LIST_BY_SELLER_ID => ['seller_id'],
            self::CACHE_KEY_RULE_LIST_BY_IS_SELLER_MEMBER => ['is_seller_member']
        ];
    }
            
	/**
	 * @param int $sellerId
	 * @return static[]
	 */
	static public function listSellerMember($sellerId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("seller_id = :seller_id:");
		$do->setBind([
			"seller_id" => $sellerId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_SELLER_ID);
		return parent::findUseDO($do);
	}

    /**
     * @param int $isSellerMember
     * @return static[]
     */
    static public function listMember($isSellerMember = 0)
    {
        $do = new ModelQueryDO();
        $do->setConditions("is_seller_member = :is_seller_member:");
        $do->setBind(["is_seller_member" => $isSellerMember]);
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_IS_SELLER_MEMBER);
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
            