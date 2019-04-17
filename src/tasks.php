<?php

return [
    'EPCheckCreditBalance' => EasyParcel\Tasks\CheckCreditBalanceTask::class,
    'EPRateCheckingBulk' => EasyParcel\Tasks\RateCheckingTask::class,
    'EPSubmitOrderBulk' => EasyParcel\Tasks\SubmitOrderBulkTask::class,
    'EPPayOrderBulk' => EasyParcel\Tasks\PayOrderBulkTask::class,
    'EPOrderStatusBulk' => EasyParcel\Tasks\OrderstatusBulkTask::class,
    'EPParcelStatusBulk' => EasyParcel\Tasks\ParcelStatusBulkTask::class,
    'EPTrackingBulk' => EasyParcel\Tasks\TrackingBulkTask::class,
    'EPNormalRateCheckingBulk' => EasyParcel\Tasks\NormalRateCheckingBulkTask::class,
];
