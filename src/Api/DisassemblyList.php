<?php

namespace UmiMood\Dear\Api;

/**
 * Class DisassemblyList
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class DisassemblyList extends BaseApi
{
    protected function getGUID()
    {
        return "TaskID";
    }

    protected function getAction()
    {
        return 'disassemblyList';
    }
}