<?php
require_once __DIR__.'/vendor/autoload.php';

use EasyParcel\Client;
use GuzzleHttp\Client as HttpClient;

$apiKey = '';

$client = Client::make($apiKey)
    ->action('EPRateCheckingBulk')
    ->dispatch([
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
    ])
    ->getBody()
    ->getContents();

var_dump($client);
