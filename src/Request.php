<?php

namespace EasyParcel;

use GuzzleHttp\ClientInterface;

abstract class Request
{
    /**
     * @var string
     */
    protected $endpoint = 'http://connect.easyparcel.my';

    /**
     * @var mixed
     */
    protected $client;

    /**
     * @var mixed
     */
    protected $apikey;

    /**
     * @var mixed
     */
    protected $useSandbox = false;

    /**
     * @param string $apikey
     */
    public function __construct( ? string $apikey, ClientInterface $client)
    {
        $this->apikey = $apikey;
        $this->client = $client;
    }

    /**
     * @param $value
     */
    public function stageMarking($value) : self
    {
        $this->useSandbox = $value;
        $this->endpoint = $value ? 'http://demo.connect.easyparcel.my' : $this->endpoint;
        return $this;
    }

    /**
     * @param  string  $endpoint
     * @return mixed
     */
    public function setEndpoint(string $endpoint): self
    {
        $this->endpoint = $endpoint;
    }

    /**
     * @return mixed
     */
    public function getEndpoint(): string
    {
        return $this->endpoint.'?ac='.$this->getTask();
    }

}
