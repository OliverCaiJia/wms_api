<?php
/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 2017/7/24
 * Time: 下午4:02
 */

namespace WmsApi\Lib\DomainObject;


use WmsApi\Lib\Model\LogisticCompany;
use WmsApi\Lib\Model\UsableLogisticCompany;

class LogisticCompanyDO
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * LogisticOrderGoodsDO constructor.
     * @param LogisticCompany $logisticCompany
     * UsableLogisticCompany $usableLogisticCompany
     */
    public function __construct(LogisticCompany $logisticCompany, UsableLogisticCompany $usableLogisticCompany)
    {
        $this->setId($logisticCompany->getId());
        $this->setName($usableLogisticCompany->getName());
    }
}