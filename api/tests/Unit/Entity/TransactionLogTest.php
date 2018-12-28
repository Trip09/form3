<?php

namespace App\Tests\Unit\Entity;

use App\Entity\TransactionLog;
use App\Tests\DataProviders\PaymentItem;
use App\Tests\DataProviders\TransactionLogItem;
use PHPUnit\Framework\TestCase;

class TransactionLogTest extends TestCase
{
    public function testPopulateFromTransaction()
    {
        $transactionExpected = TransactionLogItem::object();

        $transactionLog            = new TransactionLog();
        $transactionLog->createdAt = $transactionExpected->createdAt;
        $transactionLog->updatedAt = $transactionExpected->updatedAt;

        $transactionLog->populateFromPayment(PaymentItem::object());

        $this->assertEquals($transactionExpected, $transactionLog);
    }
}
