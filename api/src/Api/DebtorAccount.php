<?php

namespace App\Api;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     itemOperations={},
 *     collectionOperations={}
 * )
 */
class DebtorAccount implements AccountInterface
{
    use AccountTrait;
    use BankTrait;

    /**
     * DebtorAccount constructor.
     *
     * @param string $accountName
     * @param string $accountNumber
     * @param string $accountNumberCode
     * @param string $address
     * @param string $name
     * @param string $bankId
     * @param string $bankIdCode
     */
    public function __construct(
        string $accountName,
        string $accountNumber,
        string $accountNumberCode,
        string $address,
        string $name,
        string $bankId,
        string $bankIdCode
    ) {
        $this->accountName       = $accountName;
        $this->accountNumber     = $accountNumber;
        $this->accountNumberCode = $accountNumberCode;
        $this->address           = $address;
        $this->name              = $name;
        $this->bankId            = $bankId;
        $this->bankIdCode        = $bankIdCode;
    }
}