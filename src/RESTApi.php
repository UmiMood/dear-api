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

namespace UmiMood\Dear;

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