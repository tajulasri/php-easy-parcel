<?php
namespace EasyParcel\Tests;

use EasyParcel\Action;
use EasyParcel\ClientFactory;
use EasyParcel\Tests\TestCase;

class ClientTest extends TestCase
{

    /**
     * @test
     */
    public function should_give_client_default_action()
    {
        $client = ClientFactory::make(static::API_KEY)->setup();
        $this->assertSame(Action::CREDIT_BALANCE_CHECKING, $client->getAction());
    }

    /**
     * @test
     */
    public function should_client_should_called_via_make()
    {
        $client = ClientFactory::make(static::API_KEY)->setup();
        $this->assertSame(static::API_KEY, $client->getApiKey());
        $this->assertSame('http://connect.easyparcel.my?ac='.$client->getAction(), $client->getTaskHandler()->getEndpoint());
    }

    /**
     * @test
     */
    public function should_allow_client_to_use_sandbox()
    {
        $client = ClientFactory::make(static::API_KEY)->useSandbox()->setup();
        $this->assertSame(static::API_KEY, $client->getApiKey());
        $this->assertSame(
            'http://demo.connect.easyparcel.my?ac='.$client->getAction(), $client->getTaskHandler()->getEndpoint()
        );
    }

    /**
     * @test
     */
    public function should_setup_given_action()
    {
        $client = ClientFactory::make(static::API_KEY)
            ->action(Action::RATE_CHECKING_BULK)->useSandbox()
            ->setup();

        $this->assertSame(static::API_KEY, $client->getApiKey());
        $this->assertSame(
            'http://demo.connect.easyparcel.my?ac='.$client->getAction(), $client->getTaskHandler()->getEndpoint()
        );

        $this->assertSame(Action::RATE_CHECKING_BULK, $client->getTaskHandler()->getTask());
    }
}
