<?php

/**
 * Part of Dear package.
 *
 * @package Dear
 * @version 1.0
 * @author Umair Mahmood
 * @license MIT
 * @copyright Copyright (c) 2019 Umair Mahmood
 *
 */

namespace UmiMood\Dear;

class Config
{
    /**
     * @var string
     */
    protected $accountId;

    /**
     * @var string
     */
    protected $applicationKey;

    /**
     * Config constructor.
     * @param string $accountId
     * @param string $applicationKey
     */
    public function __construct($accountId = null, $applicationKey = null)
    {
        $this->setAccountId($accountId ?: getenv('DEAR_ACCOUNT_ID'));
        $this->setApplicationKey($applicationKey ?: getenv('DEAR_APPLICATION_KEY'));
    }

    /**
     * @return string
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

    /**
     * @param string $accountId
     */
    public function setAccountId($accountId)
    {
        $this->accountId = $accountId;
    }

    /**
     * @return string
     */
    public function getApplicationKey()
    {
        return $this->applicationKey;
    }

    /**
     * @param string $applicationKey
     */
    public function setApplicationKey($applicationKey)
    {
        $this->applicationKey = $applicationKey;
    }
}