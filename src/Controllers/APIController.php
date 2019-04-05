<?php
/*
 * Taplytics
 *
 * This file was automatically generated for taplytics by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace TaplyticsLib\Controllers;

use TaplyticsLib\APIException;
use TaplyticsLib\APIHelper;
use TaplyticsLib\Configuration;
use TaplyticsLib\Models;
use TaplyticsLib\Exceptions;
use TaplyticsLib\Http\HttpRequest;
use TaplyticsLib\Http\HttpResponse;
use TaplyticsLib\Http\HttpMethod;
use TaplyticsLib\Http\HttpContext;
use Unirest\Request;

/**
 * API methods defined
 */
class APIController extends BaseController
{

    /**
     * @var APIHelper instance of APIHelper
     */
    private $apiHelper;

    function __construct($APIHelper = null) {
        if ($APIHelper == null) {
            $APIHelper = new APIHelper();
        }
        $this->apiHelper = $APIHelper;
    }

    /**
     * All variables and their values for the given user
     *
     * @param string      $token   SDK token for the project
     * @param string      $userId  ID for given user
     * @param Models\Body $body    (optional) All relevant attributes associated with the user
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetVariables(
        $token,
        $userId,
        $body = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/variables';

        $variables = $this->apiHelper->createRequest(
            $_queryBuilder, 
            array (
                'token'   => $token,
                'user_id' => $userId,
            ), 
        $body);
        return $variables;
    }

    /**
     * For a given experiment, determine whether or not a user is in the experiment, and in which
     * variation
     *
     * @param string      $token          SDK token for the project
     * @param string      $userId         ID for given user
     * @param string      $experimentName Name of an Experiment
     * @param Models\Body $body           (optional) All relevant attributes associated with the user
     * @return string response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetVariationForExperiment(
        $token,
        $userId,
        $experimentName,
        $body = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/variation';

        return $this->apiHelper->createRequest($_queryBuilder, array (
            'token'          => $token,
            'user_id'        => $userId,
            'experimentName' => $experimentName,
        ), $body);
    }

    /**
     * Value for given Taplytics Dynamic Variable. If a user is not in an experiment containing the
     * variable, the response be the provided default value in the query params.
     *
     * @param string      $token        SDK token for the project
     * @param string      $userId       ID for given user
     * @param string      $varName      name of variable
     * @param string      $defaultValue default value to be used if user does not have variable available.
     * @param Models\Body $body         (optional) All relevant attributes associated with the user
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetVariableValue(
        $token,
        $userId,
        $varName,
        $defaultValue,
        $body = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/variablevalue';

        return $this->apiHelper->createRequest($_queryBuilder, array (
            'token'        => $token,
            'user_id'      => $userId,
            'varName'      => $varName,
            'defaultValue' => $defaultValue,
        ), $body);
    }

    /**
     * Returns a key/value pairing of all experiments that the user has been segmented into, as well as the
     * variation the users are assigned.
     *
     * @param string      $token   SDK token for the project
     * @param string      $userId  ID for current user
     * @param Models\Body $body    (optional) Provide all relevant attributes associated with the user
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetBucketing(
        $token,
        $userId,
        $body = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/bucketing';

        return $this->apiHelper->createRequest($_queryBuilder, array(
            'token'   => $token,
            'user_id' => $userId,
        ), $body);
    }

    /**
     * Send an event to Taplytics. These events are then used to compare against an experiment's goals to
     * determine the success of an A/B test.
     *
     * @param string            $token   SDK token for the project
     * @param string            $userId  ID for given user
     * @param Models\EventsBody $body    (optional) Provide an array of events, as well as all additional relevant user
     *                                   attributes.
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function postEvent(
        $token,
        $userId,
        $body = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/sendevent';

        return $this->apiHelper->createRequest($_queryBuilder, array(
            'token'   => $token,
            'user_id' => $userId,
        ), $body);
    }

    /**
     * Returns the entire configuration for the project. This is the document that informs the experiment
     * information such as segmentation. Extremely verbose and should be used for debugging.
     *
     * @param string      $token   SDK token for the project
     * @param string      $userId  ID for given user
     * @param Models\Body $body    (optional) All relevant attributes associated with the user
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetConfig(
        $token,
        $userId,
        $body = null
    ) {

        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.'/config';

        return $this->apiHelper->createRequest($_queryBuilder, array(
            'token'   => $token,
            'user_id' => $userId,
        ), $body);
    }

    /**
     * Returns the feature flags. Any feature flags that are enabled are returned in this function
     *
     * @param string      $token   SDK token for the project
     * @param string      $userId  ID for given user
     * @param Models\Body $body    (optional) All relevant attributes associated with the user
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function createGetFeatureFlags(
        $token,
        $userId,
        $body = null
    ) {

        $_queryBuilder = Configuration::$BASEURI;        
        $_queryBuilder = $_queryBuilder.'/featureflags';

        return $this->apiHelper->createRequest($_queryBuilder, array(
            'token'   => $token,
            'user_id' => $userId,
        ), $body);
    }

    /**
     * Returns true/false if the feature flag is enabled or not.
     * 
     * @param string      $token   SDK token for the project
     * @param string      $userId  ID for given user
     * @param Models\Body $body    (optional) All relevant attributes associated with the user
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function isFeatureFlagEnabled(
        $token, 
        $userId, 
        $keyName, 
        $body = null
    ) {
        $featureFlags = $this->createGetFeatureFlags($token, $userId, $body);
        foreach ($featureFlags as $flagObj) {
            if ($keyName == $flagObj->keyName) {
                return true;
            }
        }
        return false;
    }
}
