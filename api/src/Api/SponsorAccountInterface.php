<?php

namespace App\Api;

interface SponsorAccountInterface extends BankInterface
{
    public function getAccountNumber(): string;

    public function setAccountNumber(string $accountNumber): SponsorAccountInterface;
}
