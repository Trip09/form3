<?php

namespace App\Api;

interface TransactionInterface
{
    public function getType(): string;

    public function getId(): ?string;

    public function getVersion(): int;

    public function getOrganisationId(): string;

    public function getAttributes(): PaymentAttributesInterface;

    public function setType(string $type): self;

    public function setId(string $id): self;

    public function setVersion(int $version): self;

    public function setOrganisationId(string $organisationId): self;

    public function setAttributes(PaymentAttributesInterface $attributes): self;
}
