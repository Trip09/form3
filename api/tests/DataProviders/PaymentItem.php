<?php

namespace App\Tests\DataProviders;

use App\Api\PaymentInterface;
use App\Builder\PaymentBuilder;

class PaymentItem
{
    /**
     * Dummy Payment object to use in tests
     *
     * @return PaymentInterface
     */
    public static function object(): PaymentInterface
    {
        return (new PaymentBuilder())->build(TransactionLogItem::object());
    }
}
