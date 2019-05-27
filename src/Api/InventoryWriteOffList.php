<?php

namespace UmiMood\Dear\Api;

/**
 * Class InventoryWriteOffList
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class InventoryWriteOffList extends BaseApi
{
    protected
    function getGUID()
    {
        return "ID";
    }

    protected
    function getAction()
    {
        return 'inventoryWriteOffList';
    }
}