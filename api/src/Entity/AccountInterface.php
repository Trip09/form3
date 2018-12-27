<?php

namespace App\Entity;

interface AccountInterface extends BankInterface
{
    public function getAccountName(): string;

    public function getAccountNumber(): string;

    public function getAccountNumberCode(): string;

    public function getAddress(): string;

    public function getName(): string;
}
