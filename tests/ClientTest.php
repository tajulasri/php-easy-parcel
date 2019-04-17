<?php
namespace EasyParcel\Tests;

use EasyParcel\Client;
use EasyParcel\Tests\TestCase;

class ClientTest extends TestCase
{

    public function test_should_give_client_default_action()
    {
        $client = Client::make(static::API_KEY)->setup();
        $this->assertSame('EPCheckCreditBalance', $client->getAction());
    }

    public function test_should_client_should_called_via_make()
    {
        $client = Client::make(static::API_KEY)->setup();
        $this->assertSame(static::API_KEY, $client->getApiKey());
        $this->assertSame('http://connect.easyparcel.my?ac='.$client->getAction(), $client->getTaskHandler()->getEndpoint());
    }

    public function test_should_allow_client_to_use_sandbox()
    {
        $client = Client::make(static::API_KEY)->useSandbox()->setup();
        $this->assertSame(static::API_KEY, $client->getApiKey());
        $this->assertSame(
            'http://demo.connect.easyparcel.my?ac='.$client->getAction(), $client->getTaskHandler()->getEndpoint()
        );
    }
}
