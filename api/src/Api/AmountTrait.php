<?php

namespace App\Api;


trait AmountTrait
{
    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $amount;

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setAmount(string $amount): MonetaryInterface
    {
        $this->amount = $amount;

        return $this;
    }

    public function setCurrency(string $currency): MonetaryInterface
    {
        $this->currency = $currency;

        return $this;
    }
}