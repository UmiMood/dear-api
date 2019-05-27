<?php

namespace UmiMood\Dear\Api;

use UmiMood\Dear\Api\Contracts\PostMethodAllowed as PostContract;

/**
 * Class DisassemblyOrder
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear\Api
 */
class DisassemblyOrder extends BaseApi implements PostContract
{
    protected function getGUID()
    {
        return "ID";
    }

    protected function getAction()
    {
        return 'disassembly/order';
    }
}