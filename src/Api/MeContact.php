<?php

namespace UmiMood\Dear\Api;

use UmiMood\Dear\Api\Contracts\DeleteMethodAllowed as DeleteContract;
use UmiMood\Dear\Api\Contracts\PostMethodAllowed as PostContract;
use UmiMood\Dear\Api\Contracts\PutMethodAllowed as PutContract;

/**
 * Class MeContact
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class MeContact extends BaseApi implements PostContract, PutContract, DeleteContract
{
    protected function getGUID()
    {
        return "ContactID";
    }

    protected function getAction()
    {
        return 'me/contacts';
    }
}