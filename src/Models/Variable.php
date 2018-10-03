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
class Variable implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @var string|null $name public property
     */
    public $name;

    /**
     * Can be any value - string, number, boolean, or object.
     * @var object|null $value public property
     */
    public $value;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $name  Initialization value for $this->name
     * @param object $value Initialization value for $this->value
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->name  = func_get_arg(0);
            $this->value = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['name']  = $this->name;
        $json['value'] = $this->value;

        return $json;
    }
}
