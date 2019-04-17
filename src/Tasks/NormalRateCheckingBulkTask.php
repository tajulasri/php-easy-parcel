<?php

namespace EasyParcel\Tasks;

use EasyParcel\Contracts\TaskContract;
use EasyParcel\Request;
use Psr\Http\Message\ResponseInterface;

class NormalRateCheckingBulkTask extends Request implements TaskContract
{

    /**
     * @return int
     */
    public function request(array $data): ResponseInterface
    {
        return $this->client->request(
            'POST', $this->getEndpoint(), [
                'form_params' => $data,
            ]
        );
    }

    protected function getTask()
    {
        return 'EPNormalRateCheckingBulk';
    }
}
