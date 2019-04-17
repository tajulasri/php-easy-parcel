<?php
namespace EasyParcel\Tests;

use EasyParcel\Client;
use EasyParcel\Tests\TestCase;

class ClientTest extends TestCase
{
    /**
     * @return mixed
     */
    public function test_should_client_should_called_via_make()
    {
        $client = Client::make(static::API_KEY);
        $this->assertSame(static::API_KEY, $client->getApiKey());
    }
}
