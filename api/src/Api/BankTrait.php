<?php

namespace App\Api;


trait BankTrait
{
    /**
     * @var string
     */
    private $bankId;

    /**
     * @var string
     */
    private $bankIdCode;

    public function getBankId(): string
    {
        return $this->bankId;
    }

    public function getBankIdCode(): string
    {
        return $this->bankIdCode;
    }

    public function setBankId(string $bankId): BankInterface
    {
        $this->bankId = $bankId;

        return $this;
    }

    public function setBankIdCode(string $bankIdCode): BankInterface
    {
        $this->bankIdCode = $bankIdCode;

        return $this;
    }
}