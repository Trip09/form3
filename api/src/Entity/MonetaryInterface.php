<?php

namespace App\Entity;

interface MonetaryInterface
{
    public function getAmount(): string;

    public function getCurrency(): string;
}
