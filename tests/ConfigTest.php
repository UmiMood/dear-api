<?php

namespace UmiMood\Dear\Test;

use PHPUnit\Framework\TestCase;
use UmiMood\Dear\Config;

/**
 * Class ConfigTest
 * @package UmiMood\Dear\Test
 */
class ConfigTest extends TestCase
{
    public function testConfig()
    {
        $config = new Config('1111-2222', 'HELLO-WORLD');
        $this->assertInstanceOf(Config::class, $config);
    }
}