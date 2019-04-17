<?php

namespace EasyParcel\Contracts;

interface TaskContract
{
    /**
     * @param array $data
     */
    public function request(array $data);
}
