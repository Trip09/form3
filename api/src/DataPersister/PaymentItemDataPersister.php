<?php

namespace App\DataPersister;

use ApiPlatform\Core\DataPersister\DataPersisterInterface;
use App\Api\Payment;
use App\Entity\TransactionLog;
use Doctrine\ORM\EntityManagerInterface;

class PaymentItemDataPersister implements DataPersisterInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * PaymentItemDataPersister constructor.
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function supports($data): bool
    {
        return $data instanceof Payment;
    }

    public function persist($data)
    {
        $repository = $this->entityManager->getRepository(TransactionLog::class);
        $entity     = $repository->findOneById($data->getId()) ?? new TransactionLog();

        $entity->populateFromPayment($data);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        // call your persistence layer to save $data
        return $data;
    }

    public function remove($data)
    {
        $repository = $this->entityManager->getRepository(TransactionLog::class);
        $entity     = $repository->findOneById($data->getId());

        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }
}