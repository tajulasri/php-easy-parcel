<?php

use EasyParcel\Action;

return [
    Action::CREDIT_BALANCE_CHECKING => EasyParcel\Tasks\CheckCreditBalanceTask::class,
    Action::RATE_CHECKING_BULK => EasyParcel\Tasks\RateCheckingTask::class,
    Action::SUBMIT_ORDER_BULK => EasyParcel\Tasks\SubmitOrderBulkTask::class,
    Action::PAY_ORDER_BULK => EasyParcel\Tasks\PayOrderBulkTask::class,
    Action::ORDER_STATUS_BULK => EasyParcel\Tasks\OrderstatusBulkTask::class,
    Action::PARCEL_STATUS_BULK => EasyParcel\Tasks\ParcelStatusBulkTask::class,
    Action::TRACKING_BULK => EasyParcel\Tasks\TrackingBulkTask::class,
    Action::NORMAL_RATE_CHECKING => EasyParcel\Tasks\NormalRateCheckingBulkTask::class,
];
