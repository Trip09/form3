<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

/** @ApiResource(
 *     shortName="PaymentAttributes",
 *     itemOperations={},
 *     collectionOperations={}
 * )
 */
class Payment implements PaymentInterface
{
    use AmountTrait;

    /**
     * @var string
     */
    private $processingDate;

    /**
     * @var string
     */
    private $paymentId;

    /**
     * @var string
     */
    private $paymentPurpose;

    /**
     * @var string
     */
    private $paymentSchema;

    /**
     * @var string
     */
    private $paymentType;

    /**
     * @var string
     */
    private $reference;

    /**
     * @var string
     */
    private $numericReference;

    /**
     * @var string
     */
    private $endToEndReference;

    /**
     * @var string
     */
    private $schemePaymentType;

    /**
     * @var string
     */
    private $schemePaymentSubType;

    /**
     * @var ChargesInformationInterface
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *              "$ref" = "#/definitions/ChargesInformation"
     *         }
     *     }
     * )
     */
    private $chargesInformation;

    /**
     * @var BeneficiaryAccountInterface A Beneficiary Account Details
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *              "$ref" = "#/definitions/BeneficiaryAccount"
     *         }
     *     }
     * )
     */
    private $beneficiaryParty;

    /**
     * @var AccountInterface
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *              "$ref" = "#/definitions/DebtorAccount"
     *         }
     *     }
     * )
     */
    private $debtorParty;

    /**
     * @var SponsorAccountInterface
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *              "$ref" = "#/definitions/SponsorAccount"
     *         }
     *     }
     * )
     */
    private $sponsorParty;

    /**
     * @var FxInterface
     *
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *              "$ref" = "#/definitions/Fx"
     *         }
     *     }
     * )
     */
    private $fx;

    /**
     * TransactionAttributes constructor.
     *
     * @param string                      $processingDate
     * @param string                      $paymentId
     * @param string                      $paymentPurpose
     * @param string                      $paymentSchema
     * @param string                      $paymentType
     * @param string                      $reference
     * @param string                      $numericReference
     * @param string                      $endToEndReference
     * @param string                      $schemePaymentType
     * @param string                      $schemePaymentSubType
     * @param ChargesInformationInterface $chargesInformation
     * @param BeneficiaryAccountInterface $beneficiaryParty
     * @param AccountInterface            $debtorParty
     * @param SponsorAccountInterface     $sponsorParty
     * @param FxInterface                 $fx
     */
    public function __construct(
        string $processingDate,
        string $paymentId,
        string $paymentPurpose,
        string $paymentSchema,
        string $paymentType,
        string $reference,
        string $numericReference,
        string $endToEndReference,
        string $schemePaymentType,
        string $schemePaymentSubType,
        ChargesInformationInterface $chargesInformation,
        BeneficiaryAccountInterface $beneficiaryParty,
        AccountInterface $debtorParty,
        SponsorAccountInterface $sponsorParty,
        FxInterface $fx
    ) {
        $this->processingDate       = $processingDate;
        $this->paymentId            = $paymentId;
        $this->paymentPurpose       = $paymentPurpose;
        $this->paymentSchema        = $paymentSchema;
        $this->paymentType          = $paymentType;
        $this->reference            = $reference;
        $this->numericReference     = $numericReference;
        $this->endToEndReference    = $endToEndReference;
        $this->schemePaymentType    = $schemePaymentType;
        $this->schemePaymentSubType = $schemePaymentSubType;
        $this->chargesInformation   = $chargesInformation;
        $this->beneficiaryParty     = $beneficiaryParty;
        $this->debtorParty          = $debtorParty;
        $this->sponsorParty         = $sponsorParty;
        $this->fx                   = $fx;
    }

    public function getBeneficiaryParty(): BeneficiaryAccountInterface
    {
        return $this->beneficiaryParty;
    }

    public function getChargesInformation(): ChargesInformationInterface
    {
        return $this->chargesInformation;
    }

    public function getDebtorParty(): AccountInterface
    {
        return $this->debtorParty;
    }

    public function getFx(): FxInterface
    {
        return $this->fx;
    }

    public function getSponsorParty(): SponsorAccountInterface
    {
        return $this->sponsorParty;
    }

    public function getSchemePaymentSubType(): string
    {
        return $this->schemePaymentSubType;
    }

    public function getSchemePaymentType(): string
    {
        return $this->schemePaymentType;
    }

    public function getProcessingDate(): string
    {
        return $this->processingDate;
    }

    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    public function getPaymentPurpose(): string
    {
        return $this->paymentPurpose;
    }

    public function getPaymentSchema(): string
    {
        return $this->paymentSchema;
    }

    public function getPaymentType(): string
    {
        return $this->paymentType;
    }

    public function getReference(): string
    {
        return $this->reference;
    }

    public function getNumericReference(): string
    {
        return $this->numericReference;
    }

    public function getEndToEndReference(): string
    {
        return $this->endToEndReference;
    }

    /**
     * @param string $processingDate
     *
     * @return $this
     */
    public function setProcessingDate(string $processingDate): PaymentAttributesInterface
    {
        $this->processingDate = $processingDate;

        return $this;
    }

    /**
     * @param string $paymentId
     *
     * @return $this
     */
    public function setPaymentId(string $paymentId): PaymentAttributesInterface
    {
        $this->paymentId = $paymentId;

        return $this;
    }

    /**
     * @param string $paymentPurpose
     *
     * @return $this
     */
    public function setPaymentPurpose(string $paymentPurpose): PaymentAttributesInterface
    {
        $this->paymentPurpose = $paymentPurpose;

        return $this;
    }

    /**
     * @param string $paymentSchema
     *
     * @return $this
     */
    public function setPaymentSchema(string $paymentSchema): PaymentAttributesInterface
    {
        $this->paymentSchema = $paymentSchema;

        return $this;
    }

    /**
     * @param string $paymentType
     *
     * @return $this
     */
    public function setPaymentType(string $paymentType): PaymentAttributesInterface
    {
        $this->paymentType = $paymentType;

        return $this;
    }

    /**
     * @param string $reference
     *
     * @return $this
     */
    public function setReference(string $reference): PaymentAttributesInterface
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @param string $numericReference
     *
     * @return $this
     */
    public function setNumericReference(string $numericReference): PaymentAttributesInterface
    {
        $this->numericReference = $numericReference;

        return $this;
    }

    /**
     * @param string $endToEndReference
     *
     * @return $this
     */
    public function setEndToEndReference(string $endToEndReference): PaymentAttributesInterface
    {
        $this->endToEndReference = $endToEndReference;

        return $this;
    }

    /**
     * @param string $schemePaymentType
     *
     * @return $this
     */
    public function setSchemePaymentType(string $schemePaymentType): SchemePaymentInterface
    {
        $this->schemePaymentType = $schemePaymentType;

        return $this;
    }

    /**
     * @param string $schemePaymentSubType
     *
     * @return $this
     */
    public function setSchemePaymentSubType(string $schemePaymentSubType): SchemePaymentInterface
    {
        $this->schemePaymentSubType = $schemePaymentSubType;

        return $this;
    }

    /**
     * @param ChargesInformationInterface $chargesInformation
     *
     * @return $this
     */
    public function setChargesInformation(ChargesInformationInterface $chargesInformation): PaymentInterface
    {
        $this->chargesInformation = $chargesInformation;

        return $this;
    }

    /**
     * @param BeneficiaryAccountInterface $beneficiaryParty
     *
     * @return $this
     */
    public function setBeneficiaryParty(BeneficiaryAccountInterface $beneficiaryParty): PaymentInterface
    {
        $this->beneficiaryParty = $beneficiaryParty;

        return $this;
    }

    /**
     * @param AccountInterface $debtorParty
     *
     * @return $this
     */
    public function setDebtorParty(AccountInterface $debtorParty): PaymentInterface
    {
        $this->debtorParty = $debtorParty;

        return $this;
    }

    /**
     * @param SponsorAccountInterface $sponsorParty
     *
     * @return $this
     */
    public function setSponsorParty(SponsorAccountInterface $sponsorParty): PaymentInterface
    {
        $this->sponsorParty = $sponsorParty;

        return $this;
    }

    /**
     * @param FxInterface $fx
     *
     * @return $this
     */
    public function setFx(FxInterface $fx): PaymentInterface
    {
        $this->fx = $fx;

        return $this;
    }

}