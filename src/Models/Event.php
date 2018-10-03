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
class Event implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var string $eventName public property
     */
    public $eventName;

    /**
     * @todo Write general description for this property
     * @var double|null $eventValue public property
     */
    public $eventValue;

    /**
     * @todo Write general description for this property
     * @var object|null $metaData public property
     */
    public $metaData;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $eventName  Initialization value for $this->eventName
     * @param double $eventValue Initialization value for $this->eventValue
     * @param object $metaData   Initialization value for $this->metaData
     */
    public function __construct()
    {
        if (3 == func_num_args()) {
            $this->eventName  = func_get_arg(0);
            $this->eventValue = func_get_arg(1);
            $this->metaData   = func_get_arg(2);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['eventName']  = $this->eventName;
        $json['eventValue'] = $this->eventValue;
        $json['metaData']   = $this->metaData;

        return $json;
    }
}
