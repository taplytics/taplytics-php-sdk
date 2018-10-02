<?php
/*
 * Taplytics
 *
 * This file was automatically generated for taplytics by APIMATIC v2.0 ( https://apimatic.io ).
 */

namespace TaplyticsLib;

use InvalidArgumentException;
use JsonSerializable;
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
 * API utility class
 */
class APIHelper
{
    /**
    * Replaces template parameters in the given url
    * @param    string  $url         The query string builder to replace the template parameters
    * @param    array   $parameters  The parameters to replace in the url
    * @return   string  The processed url
    */
    public function appendUrlWithTemplateParameters($url, $parameters)
    {
        //perform parameter validation
        if (is_null($url) || !is_string($url)) {
            throw new InvalidArgumentException('Given value for parameter "queryBuilder" is invalid.');
        }

        if (is_null($parameters)) {
            return $url;
        }

        //iterate and append parameters
        foreach ($parameters as $key => $value) {
            $replaceValue = '';

            //load parameter value
            if (is_null($value)) {
                $replaceValue = '';
            } elseif (is_array($value)) {
                $replaceValue = implode("/", array_map("urlencode", $value));
            } else {
                $replaceValue = urlencode(strval($value));
            }

            //find the template parameter and replace it with its value
            $url = str_replace('{' . strval($key) . '}', $replaceValue, $url);
        }

        return $url;
    }

    /**
    * Appends the given set of parameters to the given query string
    * @param    string  $queryBuilder   The query url string to append the parameters
    * @param    array   $parameters     The parameters to append
    * @return   void
    */
    public function appendUrlWithQueryParameters(&$queryBuilder, $parameters)
    {
        //perform parameter validation
        if (is_null($queryBuilder) || !is_string($queryBuilder)) {
            throw new InvalidArgumentException('Given value for parameter "queryBuilder" is invalid.');
        }
        if (is_null($parameters)) {
            return;
        }
        //does the query string already has parameters
        $hasParams = (strrpos($queryBuilder, '?') > 0);

        //if already has parameters, use the &amp; to append new parameters
        $queryBuilder = $queryBuilder . (($hasParams) ? '&' : '?');

        //append parameters
        $queryBuilder = $queryBuilder . http_build_query($parameters);
    }

    /**
    * Validates and processes the given Url
    * @param    string  $url The given Url to process
    * @return   string       Pre-processed Url as string */
    public static function cleanUrl($url)
    {
        //perform parameter validation
        if (is_null($url) || !is_string($url)) {
            throw new InvalidArgumentException('Invalid Url.');
        }
        //ensure that the urls are absolute
        $matchCount = preg_match("#^(https?://[^/]+)#", $url, $matches);
        if ($matchCount == 0) {
            throw new InvalidArgumentException('Invalid Url format.');
        }
        //get the http protocol match
        $protocol = $matches[1];

        //remove redundant forward slashes
        $query = substr($url, strlen($protocol));
        $query = preg_replace("#//+#", "/", $query);

        //return process url
        return $protocol.$query;
    }

    /**
     * Deserialize a Json string
     * @param  string   $json       A valid Json string
     * @param  mixed    $instance   Instance of an object to map the json into
     * @param  boolean  $isArray    Is the Json an object array?
     * @return mixed                Decoded Json
     */
    public function deserialize($json, $instance = null, $isArray = false)
    {
        if ($instance == null) {
            return json_decode($json, true);
        } else {
            $mapper = new \apimatic\jsonmapper\JsonMapper();
            if ($isArray) {
                return $mapper->mapArray(json_decode($json), array(), $instance);
            } else {
                return $mapper->map(json_decode($json), $instance);
            }
        }
    }

    /**
     * Check if an array isAssociative (has string keys)
     * @param  array  $array  A valid array
     * @return boolean        True if the array is Associative, false if it is Indexed
     */
    private static function isAssociative($arr)
    {
        foreach ($arr as $key => $value) {
            if (is_string($key)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Prepare a model for form encoding
     * @param  JsonSerializable  $model  A valid instance of JsonSerializable
     * @return array                     The model as a map of key value pairs
     */
    public function prepareFormFields($model)
    {
        if (!$model instanceof JsonSerializable) {
            return $model;
        }

        $arr = $model->jsonSerialize();

        foreach ($model as $key => $value) {
            if ($value instanceof JsonSerializable) {
                $arr[$key] = static::prepareFormFields($model->$key);
            } elseif (is_array($value) && !empty($value) && !static::isAssociative($value) &&
                $value[0] instanceof JsonSerializable) {
                $temp = array();
                foreach ($value as $k => $v) {
                    $temp[$k] = static::prepareFormFields($v);
                }
                $arr[$key] = $temp;
            }
        }
        return $arr;
    }

    public function createRequest($url, $params, $body) {

        if ($body == null) {
            $body = new Request\Body();
        }

        //process optional query parameters
        $this->appendUrlWithQueryParameters($url, $params);

        //validate and preprocess url
        $_queryUrl = $this->cleanUrl($url);

        //prepare headers
        $_headers = array (
            'user-agent'    => 'taplytics',
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
        );

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, Request\Body::Json($body));

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }

    public function validateResponse(HttpResponse $response, HttpContext $_httpContext)
    {
        if (($response->getStatusCode() < 200) || ($response->getStatusCode() > 208)) { //[200,208] = HTTP OK
            throw new APIException('HTTP Response Not OK', $_httpContext);
        }
    }

}
