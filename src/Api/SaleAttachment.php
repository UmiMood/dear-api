<?php

namespace UmiMood\Dear\Api;

/**
 * Class SaleAttachment
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class SaleAttachment extends BaseApi
{
    protected function getGUID()
    {
        return "SaleID";
    }

    protected function getAction()
    {
        return 'sale/attachment';
    }
}