<?php

namespace UmiMood\Dear\Test;

use PHPUnit\Framework\TestCase;
use UmiMood\Dear\Helper;

/**
 * Class HelperTest
 * @package UmiMood\Dear\Test
 */
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