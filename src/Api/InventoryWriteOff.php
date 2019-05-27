<?php

namespace UmiMood\Dear\Api;

use UmiMood\Dear\Api\Contracts\DeleteMethodAllowed as DeleteContract;
use UmiMood\Dear\Api\Contracts\PostMethodAllowed as PostContract;
use UmiMood\Dear\Api\Contracts\PutMethodAllowed as PutContract;

/**
 * Class InventoryWriteOff
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class InventoryWriteOff extends BaseApi implements PostContract, PutContract, DeleteContract
{
    protected
    function getGUID()
    {
        return "ID";
    }

    protected
    function getAction()
    {
        return 'inventoryWriteOff';
    }
}