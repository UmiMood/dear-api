<?php

namespace UmiMood\Dear\Api;

use UmiMood\Dear\Api\Contracts\PostMethodAllowed as PostContract;
use UmiMood\Dear\Api\Contracts\PutMethodAllowed as PutContract;

/**
 * Class Tax
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class Tax extends BaseApi implements PostContract, PutContract
{
    protected function getGUID()
    {
        return "ID";
    }

    protected function getAction()
    {
        return 'ref/tax';
    }
}