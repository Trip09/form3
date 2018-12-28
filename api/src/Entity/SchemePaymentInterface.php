<?php

namespace App\Entity;

interface SchemePaymentInterface
{
    public function getSchemePaymentSubType(): string;

    public function getSchemePaymentType(): string;

    /**
     * @param string $schemePaymentType
     *
     * @return $this
     */
    public function setSchemePaymentType(string $schemePaymentType): SchemePaymentInterface;

    /**
     * @param string $schemePaymentSubType
     *
     * @return $this
     */
    public function setSchemePaymentSubType(string $schemePaymentSubType): SchemePaymentInterface;

}
