<?php

namespace UmiMood\Dear\Api;

/**
 * Class Transaction
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class Transaction extends BaseApi
{
    protected function getGUID()
    {
        return "ID";
    }

    protected function getAction()
    {
        return 'transactions';
    }
}