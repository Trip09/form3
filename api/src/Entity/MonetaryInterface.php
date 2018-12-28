<?php

namespace App\Entity;

interface MonetaryInterface
{
    public function getAmount(): string;

    public function getCurrency(): string;

    public function setAmount(string $amount): MonetaryInterface;

    public function setCurrency(string $currency): MonetaryInterface;
}
