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
class Attributes implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @var string|null $email public property
     */
    public $email;

    /**
     * @todo Write general description for this property
     * @var string|null $firstName public property
     */
    public $firstName;

    /**
     * @todo Write general description for this property
     * @var string|null $lastName public property
     */
    public $lastName;

    /**
     * @todo Write general description for this property
     * @var string|null $name public property
     */
    public $name;

    /**
     * @todo Write general description for this property
     * @var double|null $age public property
     */
    public $age;

    /**
     * @todo Write general description for this property
     * @var object|null $customData public property
     */
    public $customData;

    /**
     * Constructor to set initial or default values of member properties
     * @param string $email      Initialization value for $this->email
     * @param string $firstName  Initialization value for $this->firstName
     * @param string $lastName   Initialization value for $this->lastName
     * @param string $name       Initialization value for $this->name
     * @param double $age        Initialization value for $this->age
     * @param object $customData Initialization value for $this->customData
     */
    public function __construct()
    {
        if (6 == func_num_args()) {
            $this->email      = func_get_arg(0);
            $this->firstName  = func_get_arg(1);
            $this->lastName   = func_get_arg(2);
            $this->name       = func_get_arg(3);
            $this->age        = func_get_arg(4);
            $this->customData = func_get_arg(5);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['email']      = $this->email;
        $json['firstName']  = $this->firstName;
        $json['lastName']   = $this->lastName;
        $json['name']       = $this->name;
        $json['age']        = $this->age;
        $json['customData'] = $this->customData;

        return $json;
    }
}
