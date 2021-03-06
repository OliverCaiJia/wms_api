<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class AvailableContainerInventoryLog extends ModelBase
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
    protected $available_container_id;

    /**
     *
     * @var string
     */
    protected $type;

    /**
     *
     * @var integer
     */
    protected $number;

    /**
     *
     * @var integer
     */
    protected $inventory_snapshot;

    /**
     *
     * @var string
     */
    protected $reason;

    /**
     *
     * @var integer
     */
    protected $member_id;

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
     * Method to set the value of field available_container_id
     *
     * @param integer $available_container_id
     * @return $this
     */
    public function setAvailableContainerId($available_container_id)
    {
        $this->available_container_id = $available_container_id;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Method to set the value of field number
     *
     * @param integer $number
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Method to set the value of field inventory_snapshot
     *
     * @param integer $inventory_snapshot
     * @return $this
     */
    public function setInventorySnapshot($inventory_snapshot)
    {
        $this->inventory_snapshot = $inventory_snapshot;

        return $this;
    }

    /**
     * Method to set the value of field reason
     *
     * @param string $reason
     * @return $this
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

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
     * Returns the value of field available_container_id
     *
     * @return integer
     */
    public function getAvailableContainerId()
    {
        return $this->available_container_id;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the value of field number
     *
     * @return integer
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Returns the value of field inventory_snapshot
     *
     * @return integer
     */
    public function getInventorySnapshot()
    {
        return $this->inventory_snapshot;
    }

    /**
     * Returns the value of field reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
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

    const CACHE_KEY_RULE_LIST_BY_AVAILABLE_CONTAINER_ID = "list_by_available_container_id";
    /**
     * @return array
     */
    static protected function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_AVAILABLE_CONTAINER_ID => ['available_container_id'],
        ];
    }
            
	/**
	 * @param int $availableContainerId
	 * @return static[]
	 */
	static public function listByAvailableContainerId($availableContainerId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("available_container_id = :available_container_id:");
		$do->setBind([
			"available_container_id" => $availableContainerId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_AVAILABLE_CONTAINER_ID);
		return parent::findUseDO($do);
	}

}
            