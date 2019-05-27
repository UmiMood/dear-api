<?php

namespace UmiMood\Dear;

/**
 * Interface RESTApi
 *
 * @author Umair Mahmood
 * @version 2.0
 *
 * @package UmiMood\Dear
 */
interface RESTApi
{
    /**
     * @param array $parameters
     * @return mixed
     */
    public function get($parameters = []);

    /**
     * @param $guid
     * @param array $parameters
     * @return mixed
     */
    public function find($guid, $parameters = []);

    /**
     * @param array $parameters
     * @return mixed
     */
    public function create($parameters = []);

    /**
     * @param $guid
     * @param array $parameters
     * @return mixed
     */
    public function update($guid, $parameters = []);

    /**
     * @param $guid
     * @param array $parameters
     * @return mixed
     */
    public function delete($guid, $parameters = []);
}