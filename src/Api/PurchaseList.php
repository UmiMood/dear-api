<?php

namespace UmiMood\Dear\Api;

/**
 * Class PurchaseList
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class PurchaseList extends BaseApi
{
    protected function getGUID()
    {
        return "ID";
    }

    protected function getAction()
    {
        return 'purchaseList';
    }
}