# Getting started

Taplytics decisions is an API to quickly use Taplytics features and functionality at edge.

## How to Build

The generated code has dependencies over external libraries like UniRest. These dependencies are defined in the ```composer.json``` file that comes with the SDK. 
To resolve these dependencies, we use the Composer package manager which requires PHP greater than 5.3.2 installed in your system. 
Visit [https://getcomposer.org/download/](https://getcomposer.org/download/) to download the installer file for Composer and run it in your system. 
Open command prompt and type ```composer --version```. This should display the current version of the Composer installed if the installation was successful.

* Using command line, navigate to the directory containing the generated files (including ```composer.json```) for the SDK. 
* Run the command ```composer install```. This should install all the required dependencies and create the ```vendor``` directory in your project directory.

![Building SDK - Step 1](https://apidocs.io/illustration/php?step=installDependencies&workspaceFolder=Taplytics-PHP)

### [For Windows Users Only] Configuring CURL Certificate Path in php.ini

CURL used to include a list of accepted CAs, but no longer bundles ANY CA certs. So by default it will reject all SSL certificates as unverifiable. You will have to get your CA's cert and point curl at it. The steps are as follows:

1. Download the certificate bundle (.pem file) from [https://curl.haxx.se/docs/caextract.html](https://curl.haxx.se/docs/caextract.html) on to your system.
2. Add curl.cainfo = "PATH_TO/cacert.pem" to your php.ini file located in your php installation. “PATH_TO” must be an absolute path containing the .pem file.

```ini
[curl]
; A default value for the CURLOPT_CAINFO option. This is required to be an
; absolute path.
;curl.cainfo =
```

## How to Use

The following section explains how to use the Taplytics library in a new project.

### 1. Open Project in an IDE

Open an IDE for PHP like PhpStorm. The basic workflow presented here is also applicable if you prefer using a different editor or IDE.

![Open project in PHPStorm - Step 1](https://apidocs.io/illustration/php?step=openIDE&workspaceFolder=Taplytics-PHP)

Click on ```Open``` in PhpStorm to browse to your generated SDK directory and then click ```OK```.

![Open project in PHPStorm - Step 2](https://apidocs.io/illustration/php?step=openProject0&workspaceFolder=Taplytics-PHP)     

### 2. Add a new Test Project

Create a new directory by right clicking on the solution name as shown below:

![Add a new project in PHPStorm - Step 1](https://apidocs.io/illustration/php?step=createDirectory&workspaceFolder=Taplytics-PHP)

Name the directory as "test"

![Add a new project in PHPStorm - Step 2](https://apidocs.io/illustration/php?step=nameDirectory&workspaceFolder=Taplytics-PHP)
   
Add a PHP file to this project

![Add a new project in PHPStorm - Step 3](https://apidocs.io/illustration/php?step=createFile&workspaceFolder=Taplytics-PHP)

Name it "testSDK"

![Add a new project in PHPStorm - Step 4](https://apidocs.io/illustration/php?step=nameFile&workspaceFolder=Taplytics-PHP)

Depending on your project setup, you might need to include composer's autoloader in your PHP code to enable auto loading of classes.

```PHP
require_once "../vendor/autoload.php";
```

It is important that the path inside require_once correctly points to the file ```autoload.php``` inside the vendor directory created during dependency installations.

![Add a new project in PHPStorm - Step 4](https://apidocs.io/illustration/php?step=projectFiles&workspaceFolder=Taplytics-PHP)

After this you can add code to initialize the client library and acquire the instance of a Controller class. Sample code to initialize the client library and using controller methods is given in the subsequent sections.



## Initialization

### 

API client can be initialized as following.

```php

$client = new TaplyticsLib\TaplyticsClient();
```


# Class Reference

## <a name="list_of_controllers"></a>List of Controllers

* [APIController](#api_controller)

## <a name="api_controller"></a>![Class: ](https://apidocs.io/img/class.png ".APIController") APIController

### Get singleton instance

The singleton instance of the ``` APIController ``` class can be accessed from the API Client.

```php
$client = $client->getClient();
```

### <a name="create_get_variables"></a>![Method: ](https://apidocs.io/img/method.png ".APIController.createGetVariables") createGetVariables

> All variables and their values for the given user


```php
function createGetVariables(
        $token,
        $userId,
        $body = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| token |  ``` Required ```  | SDK token for the project |
| userId |  ``` Required ```  | ID for given user |
| body |  ``` Optional ```  | All relevant attributes associated with the user |



#### Example Usage

```php
$token = 'token';
$userId = 'user_id';
$body = new Body();

$result = $client->createGetVariables($token, $userId, $body);

```


### <a name="create_get_variation_for_experiment"></a>![Method: ](https://apidocs.io/img/method.png ".APIController.createGetVariationForExperiment") createGetVariationForExperiment

> *Tags:*  ``` Skips Authentication ``` 

> For a given experiment, determine whether or not a user is in the experiment, and in which variation


```php
function createGetVariationForExperiment(
        $token,
        $userId,
        $experimentName,
        $body = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| token |  ``` Required ```  | SDK token for the project |
| userId |  ``` Required ```  | ID for given user |
| experimentName |  ``` Required ```  | Name of an Experiment |
| body |  ``` Optional ```  | All relevant attributes associated with the user |



#### Example Usage

```php
$token = 'token';
$userId = 'user_id';
$experimentName = 'experimentName';
$body = new Body();

$result = $client->createGetVariationForExperiment($token, $userId, $experimentName, $body);

```


### <a name="create_get_variable_value"></a>![Method: ](https://apidocs.io/img/method.png ".APIController.createGetVariableValue") createGetVariableValue

> *Tags:*  ``` Skips Authentication ``` 

> Value for given Taplytics Dynamic Variable. If a user is not in an experiment containing the variable, the response be the provided default value in the query params.


```php
function createGetVariableValue(
        $token,
        $userId,
        $varName,
        $defaultValue,
        $body = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| token |  ``` Required ```  | SDK token for the project |
| userId |  ``` Required ```  | ID for given user |
| varName |  ``` Required ```  | name of variable |
| defaultValue |  ``` Required ```  | default value to be used if user does not have variable available. |
| body |  ``` Optional ```  | All relevant attributes associated with the user |



#### Example Usage

```php
$token = 'token';
$userId = 'user_id';
$varName = 'varName';
$defaultValue = 'defaultValue';
$body = new Body();

$result = $client->createGetVariableValue($token, $userId, $varName, $defaultValue, $body);

```


### <a name="create_get_bucketing"></a>![Method: ](https://apidocs.io/img/method.png ".APIController.createGetBucketing") createGetBucketing

> Returns a key/value pairing of all experiments that the user has been segmented into, as well as the variation the users are assigned.


```php
function createGetBucketing(
        $token,
        $userId,
        $body = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| token |  ``` Required ```  | SDK token for the project |
| userId |  ``` Required ```  | ID for current user |
| body |  ``` Optional ```  | Provide all relevant attributes associated with the user |



#### Example Usage

```php
$token = 'token';
$userId = 'user_id';
$body = new Body();

$result = $client->createGetBucketing($token, $userId, $body);

```


### <a name="post_event"></a>![Method: ](https://apidocs.io/img/method.png ".APIController.postEvent") postEvent

> *Tags:*  ``` Skips Authentication ``` 

> Send an event to Taplytics. These events are then used to compare against an experiment's goals to determine the success of an A/B test.


```php
function postEvent(
        $token,
        $userId,
        $body = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| token |  ``` Required ```  | SDK token for the project |
| userId |  ``` Required ```  | ID for given user |
| body |  ``` Optional ```  | Provide an array of events, as well as all additional relevant user attributes. |



#### Example Usage

```php
$token = 'token';
$userId = 'user_id';
$body = new EventsBody();

$result = $client->postEvent($token, $userId, $body);

```


### <a name="create_get_config"></a>![Method: ](https://apidocs.io/img/method.png ".APIController.createGetConfig") createGetConfig

> Returns the entire configuration for the project. This is the document that informs the experiment information such as segmentation. Extremely verbose and should be used for debugging.


```php
function createGetConfig(
        $token,
        $userId,
        $body = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| token |  ``` Required ```  | SDK token for the project |
| userId |  ``` Required ```  | ID for given user |
| body |  ``` Optional ```  | All relevant attributes associated with the user |



#### Example Usage

```php
$token = 'token';
$userId = 'user_id';
$body = new Body();

$result = $client->createGetConfig($token, $userId, $body);

```


[Back to List of Controllers](#list_of_controllers)



