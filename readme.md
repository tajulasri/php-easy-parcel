## Easy parcel PHP Package

[![Build Status](https://travis-ci.org/tajulasri/php-easy-parcel.svg?branch=master)](https://travis-ci.org/tajulasri/php-easy-parcel)

Documentation: 
https://developers.easyparcel.com/?pg=DocAPI


## Getting started

### Installation
```php
composer require tajulasri/easy-parcel
```

## Available Actions
```php

    const CREDIT_BALANCE_CHECKING = 'EPCheckCreditBalance';
    const NORMAL_RATE_CHECKING = 'EPNormalRateCheckingBulk';
    const ORDER_STATUS_BULK = 'EPOrderStatusBulk';
    const PARCEL_STATUS_BULK = 'EPParcelStatusBulk';
    const PAY_ORDER_BULK = 'EPPayOrderBulk';
    const RATE_CHECKING_BULK = 'EPRateCheckingBulk';
    const SUBMIT_ORDER_BULK = 'EPSubmitOrderBulk';
    const TRACKING_BULK = 'EPTrackingBulk';

```

## Example of usages

### 1. Checking credit balance

```php
require_once __DIR__.'/vendor/autoload.php';

use EasyParcel\ClientFactory;
use GuzzleHttp\Client as HttpClient;

$apiKey = 'sample_api_key';

$client = ClientFactory::make($apiKey)
    ->action(Action::CREDIT_BALANCE_CHECKING)
    ->useSandbox()
    ->setup();

//since we return Psr\Http\Message\ResponseInterface
//please refer http://docs.guzzlephp.org/en/stable/quickstart.html#using-responses
//for more info about how to use those response
$response = $client->dispatch();
print_r($response->getBody()->getContents());

```

### 2. Checking rate 

```php
require_once __DIR__.'/vendor/autoload.php';

use EasyParcel\ClientFactory;
use GuzzleHttp\Client as HttpClient;

$apiKey = 'sample_api_key';

$client = ClientFactory::make($apiKey)
    ->action(Action::RATE_CHECKING_BULK)
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

$response = $client->dispatch();
print_r($response->getBody()->getContents());

```


### 3. Parcel Status checking

```php
require_once __DIR__.'/vendor/autoload.php';

use EasyParcel\ClientFactory;
use GuzzleHttp\Client as HttpClient;

$apiKey = 'sample_api_key';

$client = ClientFactory::make($apiKey)
    ->action(Action::PARCEL_STATUS_BULK)
    ->useSandbox()
    ->setup([
        'bulk' => [
            [
               'order_no'   => 'EI-AAGWD',
            ],
        ],
    ]);

$response = $client->dispatch();
print_r($response->getBody()->getContents());

```

### 4. Making order

```php
require_once __DIR__.'/vendor/autoload.php';

use EasyParcel\ClientFactory;
use GuzzleHttp\Client as HttpClient;

$apiKey = 'sample_api_key';

$client = ClientFactory::make($apiKey)
    ->action(Action::SUBMIT_ORDER_BULK)
    ->useSandbox()
    ->setup([
        'bulk' => [
            [
               'weight' => '1',
                'width' => '0',
                'length'    => '0',
                'height'    => '0',
                'content'   => '2017-09-14 - book',
                'value' => '20',
                'service_id'    => 'EP-CS0W',
                'pick_point'    => 'PGEON_P_JJT',
                'pick_name' => 'Yong Tat',
                'pick_company'  => 'Yong Tat Sdn Bhd',
                'pick_contact'  => '+6012-1234-5678',
                'pick_mobile'   => '+6017-1234-5678',
                'pick_addr1'    => 'ppppp46/7 adfa',
                'pick_addr2'    => 'test',
                'pick_addr3'    => 'test',
                'pick_addr4'    => '',
                'pick_city' => 'NT',
                'pick_state'    => 'NT',
                'pick_code' => '14300',
                'pick_country'  => 'MY',
                'send_point'    => 'PGEON_P_E',
                'send_name' => 'Sam',
                'send_company'  => '',
                'send_contact'  => '+6012-2134567',
                'send_mobile'   => '+6017-1234-5678',
                'send_addr1'    => 'ssssadsasdst test',
                'send_addr2'    => 'test test',
                'send_addr3'    => 'test',
                'send_addr4'    => '',
                'send_city' => 'NT',
                'send_state'    => 'NT',
                'send_code' => '11950',
                'send_country'  => 'MY',
                'collect_date'  => '2017-11-10',
                'sms'   => '1',
                'send_email'    => 'xxxxxx@hotmail.com',
                'hs_code'   => 'yshs_code'
            ],
        ],
    ]);

$response = $client->dispatch();
print_r($response->getBody()->getContents());

```

### Contribution
Any issues can be addresses on repository issues board.


### Testing
```php
./vendor/bin/phpunit
```
