<?php

namespace WmsApi\Lib\Model;
use WmsApi\Lib\Constant\Enum\OrderStatusEnum;
use WmsApi\Lib\Constant\ServiceName;
use OK\PhalconEnhance\DomainObject\ModelQueryDO;
use OK\PhalconEnhance\MvcBase\ModelBase;

class Order extends ModelBase
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
    protected $order_sn;

    /**
     *
     * @var integer
     */
    protected $platform_source_id;

    /**
     *
     * @var integer
     */
    protected $seller_id;

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
     * @var string
     */
    protected $buyer_message;

    /**
     * @var double
     */
    protected $paid_price;

    /**
     * @var double
     */
    protected $total_price;

    /**
     *
     * @var string
     */
    protected $identity_card;

    /**
     *
     * @var string
     */
    protected $identity_card_front;

    /**
     *
     * @var string
     */
    protected $identity_card_contrary;

    /**
     *
     * @var integer
     */
    protected $status;

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
     *
     * @var int
     */
    protected $conid;

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
     * Method to set the value of field order_sn
     *
     * @param string $order_sn
     * @return $this
     */
    public function setOrderSn($order_sn)
    {
        $this->order_sn = $order_sn;

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
     * Method to set the value of field buyer_message
     *
     * @param string $buyer_message
     * @return $this
     */
    public function setBuyerMessage($buyer_message)
    {
        $this->buyer_message = $buyer_message;

        return $this;
    }

    /**
     * Method to set the value of field paid_price
     *
     * @param double $paid_price
     * @return $this
     */
    public function setPaidPrice($paid_price)
    {
        $this->paid_price = $paid_price;

        return $this;
    }

    /**
     * Method to set the value of field total_price
     *
     * @param double $total_price
     * @return $this
     */
    public function setTotalPrice($total_price)
    {
        $this->total_price = $total_price;

        return $this;
    }

    /**
     * Method to set the value of field identity_card
     *
     * @param string $identity_card
     * @return $this
     */
    public function setIdentityCard($identity_card)
    {
        $this->identity_card = $identity_card;

        return $this;
    }

    /**
     * Method to set the value of field identity_card_front
     *
     * @param string $identity_card_front
     * @return $this
     */
    public function setIdentityCardFront($identity_card_front)
    {
        $this->identity_card_front = $identity_card_front;

        return $this;
    }

    /**
     * Method to set the value of field identity_card_contrary
     *
     * @param string $identity_card_contrary
     * @return $this
     */
    public function setIdentityCardContrary($identity_card_contrary)
    {
        $this->identity_card_contrary = $identity_card_contrary;

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
     * Returns the value of field order_sn
     *
     * @return string
     */
    public function getOrderSn()
    {
        return $this->order_sn;
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
     * Returns the value of field seller_id
     *
     * @return integer
     */
    public function getSellerId()
    {
        return $this->seller_id;
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
     * Returns the value of field buyer_message
     *
     * @return string
     */
    public function getBuyerMessage()
    {
        return $this->buyer_message;
    }

    /**
     * Returns the value of field paid_price
     *
     * @return double
     */
    public function getPaidPrice()
    {
        return $this->paid_price;
    }

    /**
     * Returns the value of field total_price
     *
     * @return double
     */
    public function getTotalPrice()
    {
        return $this->total_price;
    }

    /**
     * Returns the value of field identity_card
     *
     * @return string
     */
    public function getIdentityCard()
    {
        return $this->identity_card;
    }

    /**
     * Returns the value of field identity_card_front
     *
     * @return string
     */
    public function getIdentityCardFront()
    {
        return $this->identity_card_front;
    }

    /**
     * Returns the value of field identity_card_contrary
     *
     * @return string
     */
    public function getIdentityCardContrary()
    {
        return $this->identity_card_contrary;
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
     * @return int
     */
    public function getConid()
    {
        return $this->conid;
    }

    /**
     * @param int $conid
     * @return Order
     */
    public function setConid($conid)
    {
        $this->conid = $conid;
        return $this;
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

    const CACHE_KEY_RULE_LIST_BY_SELLER_ID = 'list_by_seller_id';
    const CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_STATUS = 'list_by_seller_id_and_status';

    /**
     * @return array
     */
    protected static function getUniqueKeys()
    {
        return ['platform_source_id,order_sn'];
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
            self::CACHE_KEY_RULE_LIST_BY_SELLER_ID => ['seller_id'],
            self::CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_STATUS => ['seller_id,status']
        ];
    }

    /**
     * @param int $sellerId
     * @return static[]
     */
    public static function listBySellerId($sellerId)
    {
        $do = new ModelQueryDO();
        $do->setConditions('seller_id = :seller_id:');
        $do->setBind([
            'seller_id' => $sellerId,
        ]);
        $do->setOrderBy('id DESC');
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_SELLER_ID);
        return parent::findUseDO($do);
    }

    /**
     * @param int $sellerId
     * @param int $status
     * @return static[]
     */
    public static function listBySellerIdAndStatus($sellerId, $status)
    {
        $do = new ModelQueryDO();
        $do->setConditions('seller_id = :seller_id: AND status = :status:');
        $do->setBind([
            'seller_id' => $sellerId,
            'status' => $status,
        ]);
        $do->setOrderBy('modified DESC,id ASC ');
        $do->setCacheKeyRule(self::CACHE_KEY_RULE_LIST_BY_SELLER_ID_AND_STATUS);
        return parent::findUseDO($do);
    }

    /**
     * @param int $sellerId
     * @return static
     */
    public static function getWaitVerifyOrder($sellerId)
    {
        $do = new ModelQueryDO();
        $do->setConditions('seller_id = :seller_id: AND status = :status:');
        $do->setBind([
            'seller_id' => $sellerId,
            'status' => OrderStatusEnum::WAIT_VERIFY,
        ]);
        $do->setOrderBy('id DESC');
        return parent::findFirstUseDO($do);
    }

    /**
     * @param int $status
     * @return static[]
     */
    public static function listByEmptyConId($status)
    {
        $do = new ModelQueryDO();
        $do->setConditions("status = :status: and conid = 0");
        $do->setBind([
            'status' => $status,
        ]);
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
            