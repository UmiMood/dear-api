<?php

namespace UmiMood\Dear\Api;

/**
 * Class MoneyTaskList
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class MoneyTaskList extends BaseApi
{
    protected function getGUID()
    {
        return "ID";
    }

    protected function getAction()
    {
        return 'moneyTaskList';
    }
}