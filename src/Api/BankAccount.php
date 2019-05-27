<?php

namespace UmiMood\Dear\Api;

/**
 * Class BankAccount
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class BankAccount extends BaseApi
{
    protected function getGUID()
    {
        return "ID";
    }

    protected function getAction()
    {
        return 'ref/accountBank';
    }
}