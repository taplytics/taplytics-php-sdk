<?php 
use Unirest\Request;
use \Mockery\Adapter\Phpunit\MockeryTestCase;

/**
 * @runTestsInSeparateProcesses
 * @preserveGlobalState disabled
 */
final class APITestCases extends MockeryTestCase {

    public function tearDown()
    {
        Mockery::close();
    }

    public function setup() {
        // create mocks and inject dependencies
        $this->client = \Mockery::mock('TaplyticsLib\TaplyticsClient');
        $this->apiHelper = \Mockery::mock('TaplyticsLib\APIHelper');
        $this->controller = new TaplyticsLib\Controllers\APIController($this->apiHelper);
        $this->client->shouldReceive('getClient')->andReturn($this->controller);
        $this->client = $this->client->getClient();

        // dummy data
        $this->token = 'dummy_token';
        $this->userId = 'my_user_id';
        $this->data = array('attributes' => array('age' => 25), 'events' => array('eventName' => 'event 1', 'eventValue' => 2));
    }

    public function testFeatureFlagsCallsCreateRequest(): void {
        $body = Request\Body::form($this->data);

        $featureFlags = array(
            '0' => array(
                'name' => 'Feature flag 1', 'keyName' => 'featureFlag1'
            ),
            '1' => array(
                'name' => 'Create New Feature Flag Feature', 'keyName' => 'createNewFeatureFlagFeature'
            ),
            '2' => array(
                'name' => 'New Feature Flag', 'keyName' => 'newFeatureFlag'
            )
        );

        $this->apiHelper->shouldReceive('createRequest')
            ->with(
                'https://decision.taplytics.com/v1/featureflags', 
                array(
                    'token'   => $this->token,
                    'user_id' => $this->userId,
                ),
                $body
            )->andReturn($featureFlags);

        $result = $this->client->createGetFeatureFlags($this->token, $this->userId, $body);

        $this->assertEquals(
            $featureFlags,
            $result
        );
    }

    public function testConfigCallsCreateRequest(): void {   
        $body = Request\Body::form($this->data);

        $config = \Mockery::mock();

        $this->apiHelper->shouldReceive('createRequest')
            ->with(
                'https://decision.taplytics.com/v1/config', 
                array(
                    'token'   => $this->token,
                    'user_id' => $this->userId,
                ),
                $body
            )->andReturn($config);

        $result = $this->client->createGetConfig($this->token, $this->userId, $body);

        $this->assertEquals($result, $config);
    }

    public function testPostEventCallsCreateRequest(): void {
        
        $body = Request\Body::form($this->data);

        $response = \Mockery::mock();

        $this->apiHelper->shouldReceive('createRequest')
            ->with(
                'https://decision.taplytics.com/v1/sendevent', 
                array(
                    'token'   => $this->token,
                    'user_id' => $this->userId,
                ),
                $body
            )->andReturn($response);

        $result = $this->client->postEvent($this->token, $this->userId, $body);

        $this->assertEquals($result, $response);
    }

    public function testGetBucketingCallsCreateRequest(): void {
        
        $body = Request\Body::form($this->data);

        $bucketing = array(
            'A New Kind of Experiment!' => 'baseline'
        );

        $this->apiHelper->shouldReceive('createRequest')
            ->with(
                'https://decision.taplytics.com/v1/bucketing', 
                array(
                    'token'   => $this->token,
                    'user_id' => $this->userId,
                ),
                $body
            )->andReturn($bucketing);

        $result = $this->client->createGetBucketing($this->token, $this->userId, $body);

        $this->assertEquals($result, $bucketing);
    }

    public function testGetVariableValueCallsCreateRequest(): void {
        
        $body = Request\Body::form($this->data);

        $varName = 'Variable name';
        $defaultValue = 'Default dance!';
        $value = 'value -3';

        $this->apiHelper->shouldReceive('createRequest')
            ->with(
                'https://decision.taplytics.com/v1/variablevalue', 
                array(
                    'token'   => $this->token,
                    'user_id' => $this->userId,
                    'varName' => $varName,
                    'defaultValue' => $defaultValue
                ),
                $body
            )->andReturn($value);

        $result = $this->client->createGetVariableValue($this->token, $this->userId, $varName, $defaultValue, $body);

        $this->assertEquals($result, $value);
    }

    public function testVariationFromExperimentCallsCreateRequest(): void {
        
        $body = Request\Body::form($this->data);

        $response = \Mockery::mock();

        $experimentName = 'Experiment 1';
        $variation = 'Variation 1';

        $this->apiHelper->shouldReceive('createRequest')
            ->with(
                'https://decision.taplytics.com/v1/variation', 
                array(
                    'token'   => $this->token,
                    'user_id' => $this->userId,
                    'experimentName' => $experimentName
                ),
                $body
            )->andReturn($variation);

        $result = $this->client->createGetVariationForExperiment($this->token, $this->userId, $experimentName, $body);

        $this->assertEquals($result, $variation);
    }

    public function testVariablesCallsCreateRequest(): void {
        
        $body = Request\Body::form($this->data);

        $response = \Mockery::mock();

        $variables = array(
            '0' => array('variable name' => 'variable value 333'),
            '1' => array('numberValue' => 3),
        );

        $this->apiHelper->shouldReceive('createRequest')
            ->with(
                'https://decision.taplytics.com/v1/variables', 
                array(
                    'token'   => $this->token,
                    'user_id' => $this->userId
                ),
                $body
            )->andReturn($variables);

        $result = $this->client->createGetVariables($this->token, $this->userId, $body);
        $this->assertEquals($result[0], $variables[0]);

    }
}

?> 