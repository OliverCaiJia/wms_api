<?php

/**
 * Created by PhpStorm.
 * User: wangpeng
 * Date: 17/3/9
 * Time: 上午11:00
 */

namespace WmsApi\Lib\DomainObject\ServiceReturnData;


use OK\PhpEnhance\DomainObject\ServiceReturnDataDO;

class MemberLoginReturnData extends ServiceReturnDataDO
{
    /**
     * @var string
     */
    protected $sessionId;

    /**
     * @var integer
     */
    protected $sellerId;

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->sessionId;
    }

    /**
     * @param string $sessionId
     */
    public function setSessionId($sessionId)
    {
        $this->sessionId = $sessionId;
    }

    /**
     * @return int
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * @param int $sellerId
     */
    public function setSellerId($sellerId)
    {
        $this->sellerId = $sellerId;
    }
}