<?php

namespace App\Entity;

interface PaymentAttributesInterface extends SchemePaymentInterface
{
    public function getProcessingDate(): string;

    public function getPaymentId(): string;

    public function getPaymentPurpose(): string;

    public function getPaymentSchema(): string;

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
    public function setPaymentSchema(string $paymentSchema): PaymentAttributesInterface;

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
}

