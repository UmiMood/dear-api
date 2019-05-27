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