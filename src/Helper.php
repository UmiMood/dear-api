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

namespace UmiMood\Dear;

use UmiMood\Dear\Api\BaseApi;

class Helper
{
    /**
     * @param $parameters
     * @return mixed
     */
    public static function prepareParameters($parameters)
    {
        // set limit & page
        if (!isset($parameters['page'])) {
            $parameters['page'] = BaseApi::PAGE;
        }

        if (!isset($parameters['limit'])) {
            $parameters['limit'] = BaseApi::LIMIT;
        }

        return $parameters;
    }
}