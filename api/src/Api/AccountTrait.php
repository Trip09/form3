<?php

namespace App\Api;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource()
 */
trait AccountTrait
{
    /**
     * @var string
     */
    private $accountName;

    /**
     * @var string
     */
    private $accountNumber;

    /**
     * @var string
     */
    private $accountNumberCode;

    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $name;

    public function getAccountName(): string
    {
        return $this->accountName;
    }

    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    public function getAccountNumberCode(): string
    {
        return $this->accountNumberCode;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAccountName(string $accountName): AccountInterface
    {
        $this->accountName = $accountName;

        return $this;
    }

    public function setAccountNumber(string $accountNumber): AccountInterface
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    public function setAccountNumberCode(string $accountNumberCode): AccountInterface
    {
        $this->accountNumberCode = $accountNumberCode;

        return $this;
    }

    public function setAddress(string $address): AccountInterface
    {
        $this->address = $address;

        return $this;
    }

    public function setName(string $name): AccountInterface
    {
        $this->name = $name;

        return $this;
    }

}