<?php

namespace UmiMood\Dear\Api;

/**
 * Class Me
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class Me extends BaseApi
{
    protected function getGUID()
    {
        return "";
    }

    protected function getAction()
    {
        return 'me';
    }
}