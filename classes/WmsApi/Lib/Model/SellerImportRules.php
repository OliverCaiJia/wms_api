<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class SellerImportRules extends ModelBase
{

    /**
     *
     * @var integer
     * @Primary
     * @Identity
     */
    protected $id;

    /**
     *
     * @var integer
     */
    protected $seller_id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $file_type;

    /**
     *
     * @var string
     */
    protected $import_table;

    /**
     *
     * @var string
     */
    protected $rules;

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
     * @param string $name
     * @return SellerImportRules
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Method to set the value of field file_type
     *
     * @param string $file_type
     * @return $this
     */
    public function setFileType($file_type)
    {
        $this->file_type = $file_type;

        return $this;
    }

    /**
     * Method to set the value of field import_table
     *
     * @param string $import_table
     * @return $this
     */
    public function setImportTable($import_table)
    {
        $this->import_table = $import_table;

        return $this;
    }

    /**
     * Method to set the value of field rules
     *
     * @param string $rules
     * @return $this
     */
    public function setRules($rules)
    {
        $this->rules = $rules;

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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field file_type
     *
     * @return string
     */
    public function getFileType()
    {
        return $this->file_type;
    }

    /**
     * Returns the value of field import_table
     *
     * @return string
     */
    public function getImportTable()
    {
        return $this->import_table;
    }

    /**
     * Returns the value of field rules
     *
     * @return string
     */
    public function getRules()
    {
        return $this->rules;
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
                
    const CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_IMPORT_TABLE = "list_by_seller_id_and_import_table";
    /**
     * @return array
     */
    protected static function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_IMPORT_TABLE => ['seller_id,import_table'],
        ];
    }
            
	/**
	 * @param int $sellerId
	 * @param string $importTable
	 * @return static[]
	 */
	public static function listBySellerIdAndImportTable($sellerId, $importTable)
	{
		$do = new ModelQueryDO();
		$do->setConditions("seller_id = :seller_id: and import_table = :import_table:");
		$do->setBind([
			"seller_id" => $sellerId,
			"import_table" => $importTable,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_IMPORT_TABLE);
		return parent::findUseDO($do);
	}


    /**
     * @return static[]
     */
    public static function listAll()
    {
        $do = new ModelQueryDO();
        $do->setOrderBy("id DESC");
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_ALL);
        return parent::findUseDO($do);
    }
}
            