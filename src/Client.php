<?php
namespace EasyParcel;

use Exception;
use GuzzleHttp\Client as HttpClient;

class Client
{

    /**
     * default action
     * @var string
     */
    protected $action = 'EPCheckCreditBalance';

    /**
     * @var array
     */
    protected $tasks = [];

    /**
     * @var array
     */
    protected $data = [];
    /**
     * @param string $apikey
     */
    public function __construct( ? string $apikey)
    {
        $this->apikey = $apikey;
        $this->tasks = require_once __DIR__.'/tasks.php';
    }

    /**
     * @param $apikey
     */
    public static function make($apikey)
    {
        return new static($apikey);
    }

    /**
     * @param  array   $data
     * @return mixed
     */
    public function data(array $data = []) : self
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @param $action
     */
    public function action($action): self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return mixed
     */
    public function dispatch(array $data = [])
    {
        $data['api'] = $this->getApiKey();

        if (!array_key_exists($this->getAction(), $this->tasks)) {
            throw new Exception("No task handler found for current request action {$this->getAction()}", 1);
        }

        return (new $this->tasks[$this->getAction()](
            $this->getApiKey(), new HttpClient)
        )
            ->request($data);
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @return mixed
     */
    public function getApiKey()
    {
        return $this->apikey;
    }

}
