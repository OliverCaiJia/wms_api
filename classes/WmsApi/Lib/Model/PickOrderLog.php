<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class PickOrderLog extends ModelBase
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
    protected $pick_order_id;

    /**
     *
     * @var integer
     */
    protected $member_id;

    /**
     *
     * @var string
     */
    protected $member_type;

    /**
     *
     * @var string
     */
    protected $action;

    /**
     *
     * @var string
     */
    protected $comment;

    /**
     *
     * @var string
     */
    protected $created;

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
     * Method to set the value of field pick_order_id
     *
     * @param integer $pick_order_id
     * @return $this
     */
    public function setPickOrderId($pick_order_id)
    {
        $this->pick_order_id = $pick_order_id;

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
     * Method to set the value of field member_type
     *
     * @param string $member_type
     * @return $this
     */
    public function setMemberType($member_type)
    {
        $this->member_type = $member_type;

        return $this;
    }

    /**
     * Method to set the value of field action
     *
     * @param string $action
     * @return $this
     */
    public function setAction($action)
    {
        $this->action = $action;

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
     * Returns the value of field id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field pick_order_id
     *
     * @return integer
     */
    public function getPickOrderId()
    {
        return $this->pick_order_id;
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
     * Returns the value of field member_type
     *
     * @return string
     */
    public function getMemberType()
    {
        return $this->member_type;
    }

    /**
     * Returns the value of field action
     *
     * @return string
     */
    public function getAction()
    {
        return $this->action;
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
     * Returns the value of field created
     *
     * @return string
     */
    public function getCreated()
    {
        return $this->created;
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
                
    const CACHE_KEY_RULE_LIST_BY_PICK_ORDER_ID = "list_by_pick_order_id";
    /**
     * @return array
     */
    static protected function getNonUniqueCacheKeyRules()
    {
        return [
            self::CACHE_KEY_RULE_LIST_ALL => [parent::CACHE_KEY_FIELD_LIST_EMPTY],
            self::CACHE_KEY_RULE_LIST_BY_PICK_ORDER_ID => ['pick_order_id'],
        ];
    }
            
	/**
	 * @param int $pickOrderId
	 * @return static[]
	 */
	static public function listByPickOrderId($pickOrderId)
	{
		$do = new ModelQueryDO();
		$do->setConditions("pick_order_id = :pick_order_id:");
		$do->setBind([
			"pick_order_id" => $pickOrderId,
		]);
		$do->setOrderBy("id DESC");
		$do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_PICK_ORDER_ID);
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
            