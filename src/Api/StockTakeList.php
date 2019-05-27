<?php

namespace UmiMood\Dear\Api;

/**
 * Class StockTakeList
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class StockTakeList extends BaseApi
{
    protected function getGUID()
    {
        return "TaskID";
    }

    protected function getAction()
    {
        return 'stockTakeList';
    }
}