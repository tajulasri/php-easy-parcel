<?php

namespace EasyParcel\Tasks;

use EasyParcel\Contracts\TaskContract;
use EasyParcel\Request;
use Psr\Http\Message\ResponseInterface;

class PayOrderBulkTask extends Request implements TaskContract
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

    public function getTask()
    {
        return 'EPPayOrderBulk';
    }
}
