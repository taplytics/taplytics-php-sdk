<?php
/*
 * Taplytics
 *
 * This file was automatically generated for taplytics by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace TaplyticsLib;

use TaplyticsLib\Controllers;

/**
 * Taplytics client class
 */
class TaplyticsClient
{
    /**
     * Singleton access to API controller
     * @return Controllers\APIController The *Singleton* instance
     */
    public function getClient()
    {
        return new Controllers\APIController();
    }
}
