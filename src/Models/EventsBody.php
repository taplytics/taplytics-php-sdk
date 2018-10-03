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
class EventsBody implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var \TaplyticsLib\Models\Event[] $events public property
     */
    public $events;

    /**
     * @todo Write general description for this property
     * @var \TaplyticsLib\Models\Attributes|null $attributes public property
     */
    public $attributes;

    /**
     * Constructor to set initial or default values of member properties
     * @param array      $events     Initialization value for $this->events
     * @param Attributes $attributes Initialization value for $this->attributes
     */
    public function __construct()
    {
        if (2 == func_num_args()) {
            $this->events     = func_get_arg(0);
            $this->attributes = func_get_arg(1);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['events']     = $this->events;
        $json['attributes'] = $this->attributes;

        return $json;
    }
}
