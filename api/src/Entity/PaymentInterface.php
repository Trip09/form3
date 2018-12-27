<?php

namespace App\Entity;

interface PaymentInterface extends SchemePaymentInterface
{
    public function getProcessingDate(): string;

    public function getPaymentId(): string;

    public function getPaymentPurpose(): string;

    public function getPaymentSchema(): string;

    public function getPaymentType(): string;

    public function getReference(): string;

    public function getNumericReference(): string;

    public function getEndToEndReference(): string;
}

