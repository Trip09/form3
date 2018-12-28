<?php

namespace App\Entity;

use App\Api\MonetaryAmount;
use App\Api\MonetaryInterface;
use App\Api\PaymentInterface;

class TransactionLog
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int
     */
    public $version;

    /**
     * @var string
     */
    public $organisationId;

    /**
     * @var string
     */
    public $processingDate;

    /**
     * @var string
     */
    public $amount;

    /**
     * @var string
     */
    public $currency;

    /**
     * @var string
     */
    public $paymentId;

    /**
     * @var string
     */
    public $paymentPurpose;

    /**
     * @var string
     */
    public $paymentScheme;

    /**
     * @var string
     */
    public $paymentType;

    /**
     * @var string
     */
    public $reference;

    /**
     * @var string
     */
    public $numericReference;

    /**
     * @var string
     */
    public $endToEndReference;

    /**
     * @var string
     */
    public $schemePaymentType;

    /**
     * @var string
     */
    public $schemePaymentSubType;

    /**
     * @var string
     */
    public $beneficiaryAccountType;

    /**
     * @var string
     */
    public $beneficiaryAccountName;

    /**
     * @var string
     */
    public $beneficiaryAccountNumber;

    /**
     * @var string
     */
    public $beneficiaryAccountNumberCode;

    /**
     * @var string
     */
    public $beneficiaryAddress;

    /**
     * @var string
     */
    public $beneficiaryName;

    /**
     * @var string
     */
    public $beneficiaryBankId;

    /**
     * @var string
     */
    public $beneficiaryBankIdCode;

    /**
     * @var string
     */
    public $debtorAccountName;

    /**
     * @var string
     */
    public $debtorAccountNumber;

    /**
     * @var string
     */
    public $debtorAccountNumberCode;

    /**
     * @var string
     */
    public $debtorAddress;

    /**
     * @var string
     */
    public $debtorName;

    /**
     * @var string
     */
    public $debtorBankId;

    /**
     * @var string
     */
    public $debtorBankIdCode;

    /**
     * @var string
     */
    public $sponsorAccountNumber;

    /**
     * @var string
     */
    public $sponsorBankId;

    /**
     * @var string
     */
    public $sponsorBankIdCode;

    /**
     * @var string
     */
    public $contractReference;

    /**
     * @var string
     */
    public $exchangeRate;

    /**
     * @var string
     */
    public $originalAmount;

    /**
     * @var string
     */
    public $originalCurrency;

    /**
     * @var string
     */
    public $bearerCode;

    /**
     * @var MonetaryInterface[]
     */
    public $senderCharges;

    /**
     * @var string
     */
    public $receiverChargesAmount;

    /**
     * @var string
     */
    public $receiverChargesCurrency;

    /**
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @var \DateTime
     */
    public $updatedAt;

    /**
     * @var \DateTime
     */
    public $deletedAt;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): self
    {
        $this->id = $id;

        return $this;
    }


    public function populateFromPayment(PaymentInterface $payment): self
    {
        $this->id             = $payment->getId();
        $this->type           = $payment->getType();
        $this->organisationId = $payment->getOrganisationId();
        $this->version        = $payment->getVersion();

        $attributes         = $payment->getAttributes();
        $beneficiary        = $attributes->getBeneficiaryParty();
        $debtor             = $attributes->getDebtorParty();
        $sponsor            = $attributes->getSponsorParty();
        $fx                 = $attributes->getFx();
        $chargesInformation = $attributes->getChargesInformation();
        $senderCharges      = $chargesInformation->getSenderCharges();
        array_walk(
            $senderCharges,
            function (&$item, $key) {
                if ($item instanceof MonetaryAmount) {
                    $item = ['amount' => $item->getAmount(), 'currency' => $item->getCurrency()];
                }
            }
        );

        $this->processingDate       = new \DateTime($attributes->getProcessingDate());
        $this->amount               = $attributes->getAmount();
        $this->currency             = $attributes->getCurrency();
        $this->paymentId            = $attributes->getPaymentId();
        $this->paymentPurpose       = $attributes->getPaymentPurpose();
        $this->paymentScheme        = $attributes->getPaymentScheme();
        $this->paymentType          = $attributes->getPaymentType();
        $this->reference            = $attributes->getReference();
        $this->numericReference     = $attributes->getNumericReference();
        $this->endToEndReference    = $attributes->getEndToEndReference();
        $this->schemePaymentType    = $attributes->getSchemePaymentType();
        $this->schemePaymentSubType = $attributes->getSchemePaymentSubType();

        $this->beneficiaryAccountType       = $beneficiary->getAccountType();
        $this->beneficiaryName              = $beneficiary->getName();
        $this->beneficiaryAccountName       = $beneficiary->getAccountName();
        $this->beneficiaryAccountNumber     = $beneficiary->getAccountNumber();
        $this->beneficiaryAccountNumberCode = $beneficiary->getAccountNumberCode();
        $this->beneficiaryAddress           = $beneficiary->getAddress();
        $this->beneficiaryBankId            = $beneficiary->getBankId();
        $this->beneficiaryBankIdCode        = $beneficiary->getBankIdCode();

        $this->debtorName              = $debtor->getName();
        $this->debtorAccountName       = $debtor->getAccountName();
        $this->debtorAccountNumber     = $debtor->getAccountNumber();
        $this->debtorAccountNumberCode = $debtor->getAccountNumberCode();
        $this->debtorAddress           = $debtor->getAddress();
        $this->debtorBankId            = $debtor->getBankId();
        $this->debtorBankIdCode        = $debtor->getBankIdCode();

        $this->sponsorAccountNumber = $sponsor->getAccountNumber();
        $this->sponsorBankId        = $sponsor->getBankId();
        $this->sponsorBankIdCode    = $sponsor->getBankIdCode();

        $this->contractReference = $fx->getContractReference();
        $this->exchangeRate      = $fx->getExchangeRate();
        $this->originalAmount    = $fx->getOriginalAmount();
        $this->originalCurrency  = $fx->getOriginalCurrency();

        $this->bearerCode              = $chargesInformation->getBearerCode();
        $this->receiverChargesAmount   = $chargesInformation->getReceiverChargesAmount();
        $this->receiverChargesCurrency = $chargesInformation->getReceiverChargesCurrency();
        $this->senderCharges           = $senderCharges;

        $this->createdAt = $this->createdAt ?? new \DateTime();
        $this->updatedAt = $this->updatedAt ?? new \DateTime();

        return $this;
    }
}