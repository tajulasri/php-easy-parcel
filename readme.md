## Easy parcel PHP Package

Documentation: 
https://developers.easyparcel.com/?pg=DocAPI


## installation 


## Easy parcel method 

### 1. Checking credit balance

```php
require_once __DIR__.'/vendor/autoload.php';

use EasyParcel\Client;
use GuzzleHttp\Client as HttpClient;

$apiKey = 'your api key';

$client = Client::make($apiKey)
    ->action('EPCheckCreditBalance')
    //since there is not payload supplied for checking credit
    ->dispatch([])
    //this response will return ResponseInterface::class guzzle 
    ->getBody()
    ->getContents();

var_dump($client);

```