<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     itemOperations={},
 *     collectionOperations={}
 * )
 */
class BeneficiaryAccount implements BeneficiaryAccountInterface
{
    use AccountTrait;
    use BankTrait;

    /**
     * @var int
     */
    private $accountType;

    /**
     * BeneficiaryAccount constructor.
     *
     * @param string $accountName
     * @param string $accountNumber
     * @param string $accountNumberCode
     * @param string $address
     * @param string $name
     * @param int    $accountType
     * @param string $bankId
     * @param string $bankIdCode
     */
    public function __construct(
        string $accountName,
        string $accountNumber,
        string $accountNumberCode,
        string $address,
        string $name,
        int $accountType,
        string $bankId,
        string $bankIdCode
    ) {
        $this->accountNumber     = $accountNumber;
        $this->accountNumberCode = $accountNumberCode;
        $this->address           = $address;
        $this->name              = $name;
        $this->accountType       = $accountType;
        $this->bankId            = $bankId;
        $this->bankIdCode        = $bankIdCode;
    }

    public function getAccountType(): int
    {
        return $this->accountType;
    }

    public function setAccountType(string $accountType): BeneficiaryAccountInterface
    {
        $this->accountType = $accountType;

        return $this;
    }
}