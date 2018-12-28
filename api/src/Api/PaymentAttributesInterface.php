<?php

namespace App\Api;

interface PaymentAttributesInterface extends SchemePaymentInterface, MonetaryInterface
{

    public function getProcessingDate(): string;

    public function getPaymentId(): string;

    public function getPaymentPurpose(): string;

    public function getPaymentScheme(): string;

    public function getPaymentType(): string;

    public function getReference(): string;

    public function getNumericReference(): string;

    public function getEndToEndReference(): string;

    /**
     * @param string $processingDate
     *
     * @return $this
     */
    public function setProcessingDate(string $processingDate): PaymentAttributesInterface;

    /**
     * @param string $paymentId
     *
     * @return $this
     */
    public function setPaymentId(string $paymentId): PaymentAttributesInterface;

    /**
     * @param string $paymentPurpose
     *
     * @return $this
     */
    public function setPaymentPurpose(string $paymentPurpose): PaymentAttributesInterface;

    /**
     * @param string $paymentSchema
     *
     * @return $this
     */
    public function setPaymentScheme(string $paymentSchema): PaymentAttributesInterface;

    /**
     * @param string $paymentType
     *
     * @return $this
     */
    public function setPaymentType(string $paymentType): PaymentAttributesInterface;

    /**
     * @param string $reference
     *
     * @return $this
     */
    public function setReference(string $reference): PaymentAttributesInterface;

    /**
     * @param string $numericReference
     *
     * @return $this
     */
    public function setNumericReference(string $numericReference): PaymentAttributesInterface;

    /**
     * @param string $endToEndReference
     *
     * @return $this
     */
    public function setEndToEndReference(string $endToEndReference): PaymentAttributesInterface;

    public function getBeneficiaryParty(): BeneficiaryAccountInterface;

    public function getChargesInformation(): ChargesInformationInterface;

    public function getDebtorParty(): AccountInterface;

    public function getFx(): FxInterface;

    public function getSponsorParty(): SponsorAccountInterface;

    /**
     * @param BeneficiaryAccountInterface $beneficiaryParty
     *
     * @return $this
     */
    public function setBeneficiaryParty(BeneficiaryAccountInterface $beneficiaryParty): PaymentInterface;

    /**
     * @param ChargesInformationInterface $chargesInformation
     *
     * @return $this
     */
    public function setChargesInformation(ChargesInformationInterface $chargesInformation): PaymentInterface;

    /**
     * @param AccountInterface $debtorParty
     *
     * @return $this
     */
    public function setDebtorParty(AccountInterface $debtorParty): PaymentInterface;

    /**
     * @param FxInterface $fx
     *
     * @return $this
     */
    public function setFx(FxInterface $fx): PaymentInterface;

    /**
     * @param SponsorAccountInterface $sponsorParty
     *
     * @return $this
     */
    public function setSponsorParty(SponsorAccountInterface $sponsorParty): PaymentInterface;

}

