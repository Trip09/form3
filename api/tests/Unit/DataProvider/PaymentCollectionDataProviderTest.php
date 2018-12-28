<?php

namespace App\Tests\Unit\DataProvider;

use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use App\Api\Payment;
use App\Builder\PaymentBuilder;
use App\DataProvider\PaymentCollectionDataProvider;
use App\Entity\TransactionLog;
use App\Tests\Model\Query;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
use PHPUnit\Framework\TestCase;

class PaymentCollectionDataProviderTest extends TestCase
{

    public function testInstanceOfDataPersisterInterface()
    {
        $paymentCollectionDataProvider = new PaymentCollectionDataProvider(
            $this->prophesize(EntityManager::class)->reveal(),
            $this->prophesize(PaymentBuilder::class)->reveal()
        );

        $this->assertInstanceOf(CollectionDataProviderInterface::class, $paymentCollectionDataProvider);
    }

    /**
     * @dataProvider supportTypeData
     */
    public function testSupportType($expected, $item)
    {
        $paymentCollectionDataProvider = new PaymentCollectionDataProvider(
            $this->prophesize(EntityManager::class)->reveal(),
            $this->prophesize(PaymentBuilder::class)->reveal()
        );

        $this->assertEquals($expected, $paymentCollectionDataProvider->supports($item));
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

    public function testGetCollection()
    {
        $paymentStub        = $this->createMock(Payment::class);
        $transactionLogStub = $this->createMock(TransactionLog::class);
        $repositoryStub     = $this->createMock(EntityRepository::class);
        $queryBuilderStub   = $this->createMock(QueryBuilder::class);
        $queryStub          = $this->createMock(Query::class);

        $entityManagerMock  = $this->createMock(EntityManager::class);
        $paymentBuilderMock = $this->createMock(PaymentBuilder::class);


        $entityManagerMock
            ->expects($this->once())
            ->method('getRepository')
            ->with($this->equalTo(TransactionLog::class))
            ->willReturn($repositoryStub);

        $paymentBuilderMock
            ->expects($this->any())
            ->method('build')
            ->with($this->equalTo($transactionLogStub))
            ->willReturn($paymentStub);


        $repositoryStub
            ->expects($this->any())
            ->method('createQueryBuilder')
            ->willReturn($queryBuilderStub);

        $queryBuilderStub
            ->expects($this->any())
            ->method('getQuery')
            ->willReturn($queryStub);

        $queryStub
            ->expects($this->any())
            ->method('getResult')
            ->willReturn([$transactionLogStub]);

        $dataProvider = new PaymentCollectionDataProvider($entityManagerMock, $paymentBuilderMock);

        $this->assertEquals([$paymentStub], $dataProvider->getCollection(TransactionLog::class));
    }
}