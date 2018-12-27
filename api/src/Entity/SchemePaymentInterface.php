<?php

namespace App\Entity;

interface SchemePaymentInterface
{
    public function getSchemePaymentSubType(): string;

    public function getSchemePaymentType(): string;

}
