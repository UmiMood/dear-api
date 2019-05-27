<?php

namespace UmiMood\Dear\Exception;

/**
 * Class DearApiException
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Exception
 */
class DearApiException extends \Exception
{
    protected $statusCode;

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }
}