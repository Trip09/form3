<?php

namespace App\Tests\Unit\Builder;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Api\Payment;
use App\DataPersister\PaymentItemDataPersister;
use App\Entity\TransactionLog;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use PHPUnit\Framework\TestCase;

class PaymentItemDataPersisterTest extends TestCase
{

    public function testInstanceOfDataPersisterInterface()
    {
        $paymentItemDataPersister = new PaymentItemDataPersister($this->createMock(EntityManager::class));

        $this->assertInstanceOf(DataPersisterInterface::class, $paymentItemDataPersister);
    }

    /**
     * @dataProvider supportTypeData
     */
    public function testSupportType($expected, $item)
    {
        $paymentItemDataPersister = new PaymentItemDataPersister($this->createMock(EntityManager::class));

        $this->assertEquals($expected, $paymentItemDataPersister->supports($item));
    }

    public function testRemoveEntity()
    {
        $entityManagerMock  = $this->createMock(EntityManager::class);
        $repositoryStub     = $this->createMock(EntityRepository::class);
        $transactionLogStub = $this->createMock(TransactionLog::class);
        $paymentStub        = $this->createMock(Payment::class);

        $entityManagerMock
            ->expects($this->once())
            ->method('getRepository')
            ->with($this->equalTo(TransactionLog::class))
            ->willReturn($repositoryStub);

        $repositoryStub
            ->expects($this->any())
            ->method('__call')
            ->willReturn($transactionLogStub);

        // shouldBeCalledOnce()
        $entityManagerMock
            ->expects($this->once())
            ->method('remove')
            ->with($transactionLogStub);

        // shouldBeCalledOnce()
        $entityManagerMock
            ->expects($this->once())
            ->method('flush')
            ->with();

        $paymentItemDataPersister = new PaymentItemDataPersister($entityManagerMock);

        $paymentItemDataPersister->remove($paymentStub);
    }

    public function testPersistEntity()
    {
        $entityManagerMock  = $this->createMock(EntityManager::class);
        $repositoryStub     = $this->createMock(EntityRepository::class);
        $transactionLogStub = $this->createMock(TransactionLog::class);
        $paymentStub        = $this->createMock(Payment::class);

        $entityManagerMock
            ->expects($this->once())
            ->method('getRepository')
            ->with($this->equalTo(TransactionLog::class))
            ->willReturn($repositoryStub);

        $repositoryStub
            ->expects($this->any())
            ->method('__call')
            ->willReturn($transactionLogStub);

        // shouldBeCalledOnce()
        $transactionLogStub
            ->expects($this->any())
            ->method('populateFromPayment')
            ->with($paymentStub);

        // shouldBeCalledOnce()
        $entityManagerMock
            ->expects($this->once())
            ->method('persist')
            ->with($transactionLogStub);

        // shouldBeCalledOnce()
        $entityManagerMock
            ->expects($this->once())
            ->method('flush')
            ->with();

        $paymentItemDataPersister = new PaymentItemDataPersister($entityManagerMock);

        $paymentItemDataPersister->persist($paymentStub);
    }

    public function supportTypeData()
    {
        return [
            'this is a valid type'   => [
                'expected' => true,
                'item'     => $this->createMock(Payment::class),
            ],
            'this is not valid type' => [
                'expected' => false,
                'item'     => new \stdClass(),
            ],
        ];
    }
}