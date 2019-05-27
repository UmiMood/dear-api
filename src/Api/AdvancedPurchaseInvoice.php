<?php

namespace UmiMood\Dear\Api;

use UmiMood\Dear\Api\Contracts\DeleteMethodAllowed as DeleteContract;
use UmiMood\Dear\Api\Contracts\PostMethodAllowed as PostContract;

/**
 * Class AdvancedPurchaseInvoice
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class AdvancedPurchaseInvoice extends BaseApi implements PostContract, DeleteContract
{
    protected function getGUID()
    {
        return "PurchaseID";
    }

    protected function getAction()
    {
        return 'advanced-purchase/invoice';
    }
}