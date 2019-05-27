<?php

namespace UmiMood\Dear;

use UmiMood\Dear\Api\BaseApi;

/**
 * Class Helper
 * @package UmiMood\Dear
 */
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