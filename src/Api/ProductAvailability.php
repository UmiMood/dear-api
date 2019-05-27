<?php

namespace UmiMood\Dear\Api;

/**
 * Class ProductAvailability
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class ProductAvailability extends BaseApi
{
    protected function getGUID()
    {
        return "ID";
    }

    protected function getAction()
    {
        return 'ref/productavailability';
    }
}