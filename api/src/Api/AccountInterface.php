<?php

namespace App\Api;

interface AccountInterface extends BankInterface
{
    public function getAccountName(): string;

    public function getAccountNumber(): string;

    public function getAccountNumberCode(): string;

    public function getAddress(): string;

    public function getName(): string;

    public function setAccountName(string $accountName): self;

    public function setAccountNumber(string $accountNumber): self;

    public function setAccountNumberCode(string $accountNumberCode): self;

    public function setAddress(string $address): self;

    public function setName(string $name): self;
}
