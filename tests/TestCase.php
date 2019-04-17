<?php
namespace EasyParcel\Tests;

use PHPUnit\Framework\TestCase as PHPUnit;

class TestCase extends PHPUnit
{
    const API_KEY = 'test_api_key';

    /**
     * Domain api
     *
     * @var string
     */
    protected $apiEndpoint = 'https://demo.connect.easyparcel.my';

    /**
     * Teardown the test environment.
     */
    protected function tearDown(): void
    {
        parent::__construct();
    }
}
