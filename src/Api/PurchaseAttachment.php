<?php

namespace UmiMood\Dear\Api;

/**
 * Class PurchaseAttachment
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class PurchaseAttachment extends BaseApi
{
    protected function getGUID()
    {
        return "TaskID";
    }

    protected function getAction()
    {
        return 'purchase/attachment';
    }
}