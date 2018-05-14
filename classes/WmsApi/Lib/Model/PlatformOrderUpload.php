<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class PlatformOrderUpload extends ModelBase
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
    protected $seller_id;

    /**
     *
     * @var integer
     */
    protected $platform_source_id;

    /**
     * @var string
     */
    protected $original_file_name;

    /**
     *
     * @var string
     */
    protected $file_path;

    /**
     *
     * @var string
     */
    protected $file_data;

    /**
     * @var integer
     */
    protected $member_id;

    /**
     * @var integer
     */
    protected $seller_import_rules_id;

    /**
     *
     * @var integer
     */
    protected $status;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $error_data;

    /**
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
     * Method to set the value of field platform_source_id
     *
     * @param integer $platform_source_id
     * @return $this
     */
    public function setPlatformSourceId($platform_source_id)
    {
        $this->platform_source_id = $platform_source_id;

        return $this;
    }

    /**
     * Method to set the value of field original_file_name
     *
     * @param string $original_file_name
     * @return $this
     */
    public function setOriginalFileName($original_file_name)
    {
        $this->original_file_name = $original_file_name;

        return $this;
    }

    /**
     * Method to set the value of field file_path
     *
     * @param string $file_path
     * @return $this
     */
    public function setFilePath($file_path)
    {
        $this->file_path = $file_path;

        return $this;
    }

    /**
     * @param string $file_data
     * @return PlatformOrderUpload
     */
    public function setFileData($file_data)
    {
        $this->file_data = $file_data;
        return $this;
    }

    /**
     * Method to set the value of field member_id
     *
     * @param integer $member_id
     * @return $this
     */
    public function setMemberId($member_id)
    {
        $this->member_id = $member_id;

        return $this;
    }

    /**
     * @param int $seller_import_rules_id
     * @return PlatformOrderUpload
     */
    public function setSellerImportRulesId($seller_import_rules_id)
    {
        $this->seller_import_rules_id = $seller_import_rules_id;
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
     * Method to set the value of field message
     *
     * @param string $message
     * @return $this
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @param string $error_data
     * @return PlatformOrderUpload
     */
    public function setErrorData($error_data)
    {
        $this->error_data = $error_data;
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
     * Returns the value of field seller_id
     *
     * @return integer
     */
    public function getSellerId()
    {
        return $this->seller_id;
    }

    /**
     * Returns the value of field platform_source_id
     *
     * @return integer
     */
    public function getPlatformSourceId()
    {
        return $this->platform_source_id;
    }

    /**
     * Returns the value of field original_file_name
     *
     * @return string
     */
    public function getOriginalFileName()
    {
        return $this->original_file_name;
    }

    /**
     * Returns the value of field file_path
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->file_path;
    }

    /**
     * @return string
     */
    public function getFileData()
    {
        return $this->file_data;
    }

    /**
     * Returns the value of field member_id
     *
     * @return integer
     */
    public function getMemberId()
    {
        return $this->member_id;
    }

    /**
     * @return int
     */
    public function getSellerImportRulesId()
    {
        return $this->seller_import_rules_id;
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
     * Returns the value of field message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getErrorData()
    {
        return $this->error_data;
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
                
    /**
     * @return array
     */
    static protected function getUniqueKeys()
    {
        return ["platform_source_id,seller_id,file_path"];
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
        ];
    }
            
	/**
	 * @param int $sellerId
	 * @return static[]
	 */
	static public function listBySellerId($sellerId)
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
            