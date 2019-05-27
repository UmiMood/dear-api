<?php

namespace UmiMood\Dear\Api;

/**
 * Class FinishedGoodsList
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class FinishedGoodsList extends BaseApi
{
    protected function getGUID()
    {
        return "TaskID";
    }

    protected function getAction()
    {
        return 'finishedGoodsList';
    }
}