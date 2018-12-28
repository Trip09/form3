<?php

namespace App\DataProvider;

use ApiPlatform\Core\DataProvider\ItemDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Api\Payment;
use App\Builder\PaymentBuilder;
use App\Entity\TransactionLog;
use Doctrine\ORM\EntityManagerInterface;

class PaymentItemDataProvider implements ItemDataProviderInterface, RestrictedDataProviderInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var PaymentBuilder
     */
    private $paymentBuilder;

    /**
     * PaymentItemDataProvider constructor.
     *
     * @param EntityManagerInterface $entityManager
     * @param PaymentBuilder         $paymentBuilder
     */
    public function __construct(EntityManagerInterface $entityManager, PaymentBuilder $paymentBuilder)
    {
        $this->entityManager  = $entityManager;
        $this->paymentBuilder = $paymentBuilder;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Payment::class === $resourceClass;
    }

    public function getItem(string $resourceClass, $id, string $operationName = null, array $context = []): ?Payment
    {
        $repository = $this->entityManager->getRepository(TransactionLog::class);
        $entity     = $repository->findOneById($id);

        if (null === $entity) {
            return null;
        }

        return $this->paymentBuilder->build($entity);
    }
}
