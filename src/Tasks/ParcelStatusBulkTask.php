<?php

namespace EasyParcel\Tasks;

use EasyParcel\Contracts\TaskContract;
use EasyParcel\Request;
use Psr\Http\Message\ResponseInterface;

class ParcelStatusBulkTask extends Request implements TaskContract
{

    /**
     * @return Psr\Http\Message\ResponseInterface
     */
    public function request(array $data): ResponseInterface
    {
        return $this->client->request(
            'POST', $this->getEndpoint(), [
                'form_params' => $data,
            ]
        );
    }

    public function getTask(): string
    {
        return 'EPParcelStatusBulk';
    }
}
