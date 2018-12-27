<?php

namespace App\Entity;

interface ChargesInformationInterface
{
    public function getBearerCode(): string;

    public function getSenderCharges(): MonetaryCollectionInterface;

    public function getReceiverChargesAmount(): MonetaryInterface;

    public function getReceiverChargesCurrency(): MonetaryInterface;
}
