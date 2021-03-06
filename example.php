<?php
require_once __DIR__.'/vendor/autoload.php';

use EasyParcel\ClientFactory;
use GuzzleHttp\Client as HttpClient;

$apiKey = 'sample_api_key';

$client = ClientFactory::make($apiKey)
    ->action('EPRateCheckingBulk')
    ->useSandbox()
    ->setup([
        'bulk' => [
            [
                'pick_code' => '10050',
                'pick_state' => 'png',
                'pick_country' => 'MY',
                'send_code' => '11950',
                'send_state' => 'png',
                'send_country' => 'MY',
                'weight' => '5',
                'width' => '0',
                'length' => '0',
                'height' => '0',
                'date_coll' => '2017-11-08',
            ],
        ],
    ]);

var_dump($client->dispatch());
var_dump($client->getTaskHandler()->getEndpoint());
