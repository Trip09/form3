<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     itemOperations={},
 *     collectionOperations={}
 * )
 */
class Fx implements FxInterface
{
    /**
     * @var string
     */
    private $contractReference;
    /**
     * @var string
     */
    private $exchangeRate;
    /**
     * @var string
     */
    private $originalAmount;
    /**
     * @var string
     */
    private $originalCurrency;

    /**
     * Fx constructor.
     *
     * @param string $contractReference
     * @param string $exchangeRate
     * @param string $originalAmount
     * @param string $originalCurrency
     */
    public function __construct(
        string $contractReference,
        string $exchangeRate,
        string $originalAmount,
        string $originalCurrency
    ) {
        $this->contractReference = $contractReference;
        $this->exchangeRate      = $exchangeRate;
        $this->originalAmount    = $originalAmount;
        $this->originalCurrency  = $originalCurrency;
    }

    public function getContractReference(): string
    {
        return $this->contractReference;
    }

    public function getExchangeRate(): string
    {
        return $this->exchangeRate;
    }

    public function getOriginalAmount(): string
    {
        return $this->originalAmount;
    }

    public function getOriginalCurrency(): string
    {
        return $this->originalCurrency;
    }

    public function setContractReference(string $contractReference): FxInterface
    {
        $this->contractReference = $contractReference;

        return $this;
    }

    public function setExchangeRate(string $exchangeRate): FxInterface
    {
        $this->exchangeRate = $exchangeRate;

        return $this;
    }

    public function setOriginalAmount(string $originalAmount): FxInterface
    {
        $this->originalAmount = $originalAmount;

        return $this;
    }

    public function setOriginalCurrency(string $originalCurrency): FxInterface
    {
        $this->originalCurrency = $originalCurrency;

        return $this;
    }
}