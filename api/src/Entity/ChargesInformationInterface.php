<?php

namespace App\Entity;

interface ChargesInformationInterface
{
    public function getBearerCode(): string;

    public function getSenderCharges(): array;

    public function getReceiverChargesAmount(): string;

    public function getReceiverChargesCurrency(): string;

    public function setBearerCode(string $bearerCode): ChargesInformationInterface;

    public function setSenderCharges(array $monetaryCollection): ChargesInformationInterface;

    public function setReceiverChargesAmount(string $receiverChargesAmount): ChargesInformationInterface;

    public function setReceiverChargesCurrency(string $receiverChargesCurrency): ChargesInformationInterface;

}
