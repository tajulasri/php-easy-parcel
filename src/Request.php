<?php

namespace EasyParcel;

use GuzzleHttp\ClientInterface;

abstract class Request
{
    /**
     * @var string
     */
    protected $endpoint = 'https://demo.connect.easyparcel.my';

    /**
     * @var mixed
     */
    protected $client;

    /**
     * @var mixed
     */
    protected $apikey;

    /**
     * @param string $apikey
     */
    public function __construct( ? string $apikey, ClientInterface $client)
    {
        $this->apikey = $apikey;
        $this->client = $client;
    }

    /**
     * @return mixed
     */
    public function useProduction() : self
    {
        return $this->setEndpoint('using production dude');
    }

    /**
     * @param  string  $endpoint
     * @return mixed
     */
    public function setEndpoint(string $endpoint): self
    {
        return $this->endpoint = $endpoint;
    }

    /**
     * @return mixed
     */
    public function getEndpoint(): string
    {
        return $this->endpoint.'?ac='.$this->getTask();
    }

}
