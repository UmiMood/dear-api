<?php

/**
 * Part of Dear package.
 *
 * @package Dear
 * @version 1.0
 * @author Umair Mahmood
 * @license MIT
 * @copyright Copyright (c) 2019 Umair Mahmood
 *
 */

namespace UmiMood\Dear\Api;

use UmiMood\Dear\Api\Contracts\PostMethodAllowed as PostContract;

class SaleManualJournal extends BaseApi implements PostContract
{
    protected function getGUID()
    {
        return "SaleID";
    }

    protected function getAction()
    {
        return 'sale/manualJournal';
    }
}