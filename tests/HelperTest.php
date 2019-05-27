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

namespace UmiMood\Dear\Test;

use PHPUnit\Framework\TestCase;
use UmiMood\Dear\Helper;

class HelperTest extends TestCase
{
    public function testPrepareParameters()
    {
        $parameters = [];
        $parameters = Helper::prepareParameters($parameters);

        $this->assertEquals(1, $parameters['page']);
        $this->assertEquals(100, $parameters['limit']);

        $parameters['page'] = 10;
        $parameters['limit'] = 999;
        $parameters = Helper::prepareParameters($parameters);

        $this->assertEquals(10, $parameters['page']);
        $this->assertEquals(999, $parameters['limit']);
    }
}