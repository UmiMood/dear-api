<?php

namespace UmiMood\Dear\Api;

/**
 * Class SaleList
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class SaleList extends BaseApi
{
    protected function getGUID()
    {
        return "SaleID";
    }

    protected function getAction()
    {
        return 'saleList';
    }
}