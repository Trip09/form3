<?php

namespace App\Api;

interface BankInterface
{
    public function getBankId(): string;

    public function getBankIdCode(): string;

    public function setBankId(string $bankId): self;

    public function setBankIdCode(string $bankIdCode): self;
}
