<?php

namespace App\Entity;

interface BankInterface
{
    public function getBankId(): string;

    public function getBankIdCode(): string;
}
