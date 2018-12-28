<?php

namespace App\Api;

interface BeneficiaryAccountInterface extends AccountInterface
{
    public function getAccountType(): int;

    public function setAccountType(string $accountType): self;
}
