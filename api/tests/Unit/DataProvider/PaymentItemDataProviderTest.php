<?php

namespace App\Tests\Unit\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use App\Api\Payment;
use App\Builder\PaymentBuilder;
use App\DataProvider\PaymentItemDataProvider;
use App\Entity\TransactionLog;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\TestCase;

class PaymentItemDataProviderTest extends TestCase
{

    public function testInstanceOfDataPersisterInterface()
    {
        $PaymentItemDataProvider = new PaymentItemDataProvider(
            $this->prophesize(EntityManager::class)->reveal(),
            $this->prophesize(PaymentBuilder::class)->reveal()
        );

        $this->assertInstanceOf(ItemDataProviderInterface::class, $PaymentItemDataProvider);
    }

    /**
     * @dataProvider supportTypeData
     */
    public function testSupportType($expected, $item)
    {
        $PaymentItemDataProvider = new PaymentItemDataProvider(
            $this->prophesize(EntityManager::class)->reveal(),
            $this->prophesize(PaymentBuilder::class)->reveal()
        );

        $this->assertEquals($expected, $PaymentItemDataProvider->supports($item));
    }

    public function supportTypeData()
    {
        return [
            'this is a valid type'   => [
                'expected' => true,
                'item'     => Payment::class,
            ],
            'this is not valid type' => [
                'expected' => false,
                'item'     => \stdClass::class,
            ],
        ];
    }

    public function testGetItemNull()
    {
        $paymentStub        = $this->createMock(Payment::class);
        $transactionLogMock = $this->createMock(TransactionLog::class);

        $entityManagerMock  = $this->createMock(EntityManager::class);
        $repositoryStub     = $this->createMock(EntityRepository::class);
        $paymentBuilderMock = $this->createMock(PaymentBuilder::class);

        $entityManagerMock
            ->expects($this->once())
            ->method('getRepository')
            ->with($this->equalTo(TransactionLog::class))
            ->willReturn($repositoryStub);

        $repositoryStub
            ->expects($this->any())
            ->method('__call')
            ->willReturn(null);

        $paymentBuilderMock
            ->expects($this->any())
            ->method('build')
            ->with($this->equalTo($transactionLogMock))
            ->willReturn($paymentStub);

        $dataProvider = new PaymentItemDataProvider($entityManagerMock, $paymentBuilderMock);

        $this->assertNull($dataProvider->getItem(TransactionLog::class, 2));
    }

    public function testGetItemPayment()
    {
        $paymentStub        = $this->createMock(Payment::class);
        $transactionLogMock = $this->createMock(TransactionLog::class);

        $entityManagerMock  = $this->createMock(EntityManager::class);
        $repositoryStub     = $this->createMock(EntityRepository::class);
        $transactionLogStub = $this->createMock(TransactionLog::class);
        $paymentBuilderMock = $this->createMock(PaymentBuilder::class);

        $entityManagerMock
            ->expects($this->once())
            ->method('getRepository')
            ->with($this->equalTo(TransactionLog::class))
            ->willReturn($repositoryStub);

        $repositoryStub
            ->expects($this->any())
            ->method('__call')
            ->willReturn($transactionLogStub);

        $paymentBuilderMock
            ->expects($this->any())
            ->method('build')
            ->with($this->equalTo($transactionLogMock))
            ->willReturn($paymentStub);

        $dataProvider = new PaymentItemDataProvider($entityManagerMock, $paymentBuilderMock);

        $this->assertSame($paymentStub, $dataProvider->getItem(TransactionLog::class, 2));
    }
}