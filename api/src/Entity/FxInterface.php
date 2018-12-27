<?php

namespace App\Entity;

interface FxInterface // If we refract getOriginal[Amount|Currency] to get[Amount|Currency] we can use MonetaryInterface
{
    public function getContractReference(): string;

    public function getExchangeRate(): string;

    // TODO: This should be getAmount so we can unify the use of MonetaryInterface
    public function getOriginalAmount(): string;

    // TODO: This should be getCurrency so we can unify the use of MonetaryInterface
    public function getOriginalCurrency(): string;
}
