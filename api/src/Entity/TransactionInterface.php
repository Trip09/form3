<?php

namespace App\Entity;

interface TransactionInterface
{
    public function getType(): string;

    public function getId(): string;

    public function getVersion(): int;

    public function getOrganisationId(): string;

    public function getAttributes(): TransactionAttributesInterface;
}
