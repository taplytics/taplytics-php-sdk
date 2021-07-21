[![CircleCI](https://circleci.com/gh/taplytics/taplytics-php.svg?style=svg&circle-token=d02e62037b7bda13e0a56988363817478c3c7c9c)](https://circleci.com/gh/taplytics/taplytics-php)

# Getting started

Taplytics PHP SDK enables the delivery of server-side experiments, feature flags and functionality at edge.

## How to Build

Refer to [Getting Started](START.md) to build Taplytics into your project.

## Initialization

### 

API client can be initialized as following.

```php
$client = new TaplyticsLib\TaplyticsClient();
```


# Class Reference

## APIController

### Get singleton instance

The singleton instance of the ``` APIController ``` class can be accessed from the API Client.

```php
$client = $client->getClient();
```

### createGetVariables

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


### createGetVariationForExperiment

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


### createGetVariableValue

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


### createGetBucketing

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



### postEvent

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
$body = array(
	'events' => array(
	        		array('eventName' => 'event name!', 'eventValue' => 5)
				)
);

$result = $client->postEvent($token, $userId, $body);

```

The format for passing in events is as follows:

```
{
	attributes: {
		name: '',
		...
	},
	events: [
		{eventName: '', eventValue},
		...
	]
}
```


### createGetConfig

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


### createGetFeatureFlags

> Returns the list of feature flags with names and key names.

```php
function createGetFeatureFlags(
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

$result = $client->createGetFeatureFlags($token, $userId, $body);
foreach($result as $flagObj) {
        // $flagObj->name to get the name of the feature flag
        // $flagObj->keyName to get the key of the feature flag
}
```

### isFeatureFlagEnabled

> Returns true or false based on if the keyName passed in is an enabled feature flag.

```php
function isFeatureFlagEnabled(
        $token,
        $userId,
        $keyName,
        $body = null)
```

#### Parameters

| Parameter | Tags | Description |
|-----------|------|-------------|
| token |  ``` Required ```  | SDK token for the project |
| userId |  ``` Required ```  | ID for given user |
| keyName |  ``` Required ```  | key name for the feature flag |
| body |  ``` Optional ```  | All relevant attributes associated with the user |



#### Example Usage

```php
$token = 'token';
$userId = 'user_id';
$keyName = 'featureFlagKey';
$body = new Body();

$result = $client->isFeatureFlagEnabled($token, $userId, $keyName, $body);
if ($result) {
        showFeature();
}
```




