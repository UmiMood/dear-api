<?php

namespace UmiMood\Dear;

/**
 * Class Dear
 *
 * @author Umair Mahmood
 * @version 2.0
 * @package UmiMood\Dear
 *
 */
class Dear
{
    /**
     * @var Dear
     */
    protected static $instance;

    /**
     * @var Config
     */
    protected $config;

    /**
     * Dear constructor.
     * @param string $accountId
     * @param string $applicationKey
     */
    protected function __construct($accountId = null, $applicationKey = null)
    {
        $this->config = new Config($accountId, $applicationKey);
    }

    /**
     * @param string $accountId
     * @param string $applicationKey
     * @return Dear
     */
    public static function create($accountId = null, $applicationKey = null)
    {
        return (static::$instance) ? static::$instance : new static($accountId, $applicationKey);
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        $class = "\\UmiMood\\Dear\\Api\\" . ucwords($name);
        if (class_exists($class)) {
            return new $class($this->config);
        }

        throw new \BadMethodCallException("undefined method $name called.");
    }
}
