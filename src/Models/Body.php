<?php
/*
 * Taplytics
 *
 * This file was automatically generated for taplytics by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace TaplyticsLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class Body implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @var \TaplyticsLib\Models\Attributes|null $attributes public property
     */
    public $attributes;

    /**
     * Constructor to set initial or default values of member properties
     * @param Attributes $attributes Initialization value for $this->attributes
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->attributes = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['attributes'] = $this->attributes;

        return $json;
    }
}
