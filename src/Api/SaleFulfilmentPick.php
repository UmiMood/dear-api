<?php

namespace UmiMood\Dear\Api;

use UmiMood\Dear\Api\Contracts\PostMethodAllowed as PostContract;

/**
 * Class SaleFulfilmentPick
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class SaleFulfilmentPick extends BaseApi implements PostContract
{
    protected function getGUID()
    {
        return "TaskID";
    }

    protected function getAction()
    {
        return 'sale/fulfilment/pick';
    }
}