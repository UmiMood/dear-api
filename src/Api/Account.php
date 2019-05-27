<?php

namespace UmiMood\Dear\Api;

use UmiMood\Dear\Api\Contracts\DeleteMethodAllowed as DeleteContract;
use UmiMood\Dear\Api\Contracts\PostMethodAllowed as PostContract;
use UmiMood\Dear\Api\Contracts\PutMethodAllowed as PutContract;

/**
 * Class Account
 *
 * @author Umair Mahmood
 * @version 1.0
 *
 * @package UmiMood\Dear\Api
 */
class Account extends BaseApi implements PostContract, PutContract, DeleteContract
{
    protected function getGUID()
    {
        return "Code";
    }

    protected function deleteGUID()
    {
        return 'Code';
    }

    protected function getAction()
    {
        return 'ref/account';
    }
}