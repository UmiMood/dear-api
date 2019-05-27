<?php

namespace UmiMood\Dear\Api;

/**
 * Class StockAdjustmentList
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class StockAdjustmentList extends BaseApi
{
    protected function getGUID()
    {
        return "ID";
    }

    protected function getAction()
    {
        return 'stockadjustmentList';
    }
}