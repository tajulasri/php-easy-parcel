<?php
namespace EasyParcel;

use Exception;
use GuzzleHttp\Client as HttpClient;

class Client
{

    /**
     * Default action fallback
     * @var string
     */
    protected $action = 'EPCheckCreditBalance';

    /**
     * Task handlers
     * @var array
     */
    protected $tasks = [];

    /**
     * @var mixed
     */
    protected $demo = false;

    /**
     * @var mixed
     */
    protected $taskHandler;

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
     * @return mixed
     */
    public function useSandbox()
    {
        $this->demo = true;
        return $this;
    }

    /**
     * @param $action
     */
    public function action($action) : self
    {
        $this->action = $action;
        return $this;
    }

    /**
     * @return mixed
     */
    public function setup(array $data = [])
    {
        $this->data['api'] = $this->getApiKey();

        if (!array_key_exists($this->getAction(), $this->tasks)) {
            throw new Exception("No task handler found for current request action {$this->getAction()}", 1);
        }

        $this->taskHandler = (new $this->tasks[$this->getAction()](
            $this->getApiKey(), new HttpClient)
        )
            ->stageMarking($this->demo);

        return $this;
    }

    /**
     * @return mixed
     */
    public function dispatch()
    {
        return $this->taskHandler->request($this->data);
    }

    /**
     * @return mixed
     */
    public function getTaskHandler()
    {
        return $this->taskHandler;
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
    public function getApiKey()
    {
        return $this->apikey;
    }

}
