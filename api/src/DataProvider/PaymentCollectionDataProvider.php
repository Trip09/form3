<?php

namespace App\DataProvider;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\QueryResultCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGenerator;
use ApiPlatform\Core\DataProvider\CollectionDataProviderInterface;
use ApiPlatform\Core\DataProvider\RestrictedDataProviderInterface;
use App\Api\Payment;
use App\Builder\PaymentBuilder;
use App\Entity\TransactionLog;
use Doctrine\ORM\EntityManagerInterface;

class PaymentCollectionDataProvider implements CollectionDataProviderInterface, RestrictedDataProviderInterface
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
     * @var array
     */
    private $collectionExtensions;

    /**
     * PaymentCollectionDataProvider constructor.
     *
     * @param EntityManagerInterface          $entityManager
     * @param PaymentBuilder                  $paymentBuilder
     * @param array                           $collectionExtensions
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        PaymentBuilder $paymentBuilder,
        $collectionExtensions = []
    ) {
        $this->entityManager          = $entityManager;
        $this->paymentBuilder         = $paymentBuilder;
        $this->collectionExtensions   = $collectionExtensions;
    }

    public function supports(string $resourceClass, string $operationName = null, array $context = []): bool
    {
        return Payment::class === $resourceClass;
    }

    /**
     * @param string      $resourceClass
     * @param string|null $operationName
     *
     * @return array
     * @throws \ApiPlatform\Core\Exception\ResourceClassNotSupportedException
     */
    public function getCollection(string $resourceClass, string $operationName = null): array
    {
        $returnArray = [];
        $results     = $this->getCollectionOrm(TransactionLog::class, $operationName);

        foreach ($results as $entity) {
            $returnArray[] = $this->paymentBuilder->build($entity);
        }

        return $returnArray;
    }

    private function getCollectionOrm(string $resourceClass, string $operationName = null): ?array
    {
        $repository = $this->entityManager->getRepository(TransactionLog::class);

        if (!method_exists($repository, 'createQueryBuilder')) {
            throw new \RuntimeException('The repository class must have a "createQueryBuilder" method.');
        }

        $queryBuilder       = $repository->createQueryBuilder('o');
        $queryNameGenerator = new QueryNameGenerator();
        foreach ($this->collectionExtensions as $extension) {
            $extension->applyToCollection($queryBuilder, $queryNameGenerator, $resourceClass, $operationName);

            if ($extension instanceof QueryResultCollectionExtensionInterface
                && $extension->supportsResult(
                    $resourceClass,
                    $operationName
                )) {
                return $extension->getResult($queryBuilder, $resourceClass, $operationName);
            }
        }

        return $queryBuilder->getQuery()->getResult();
    }
}
