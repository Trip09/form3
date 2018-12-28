<?php

namespace App\Api;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     collectionOperations={},
 *     itemOperations={}
 * )
 */
class SponsorAccount implements SponsorAccountInterface
{
    use BankTrait;

    /**
     * @var string
     */
    private $accountNumber;

    /**
     * SponsorAccount constructor.
     *
     * @param string $accountNumber
     * @param string $bankId
     * @param string $bankIdCode
     */
    public function __construct(
        string $accountNumber,
        string $bankId,
        string $bankIdCode
    ) {
        $this->accountNumber = $accountNumber;
        $this->bankId        = $bankId;
        $this->bankIdCode    = $bankIdCode;
    }

    public function getAccountNumber(): string
    {
        return $this->accountNumber;
    }

    public function setAccountNumber(string $accountNumber): SponsorAccountInterface
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }
}