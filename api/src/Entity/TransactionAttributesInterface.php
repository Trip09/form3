<?php

namespace App\Entity;

interface TransactionAttributesInterface extends PaymentInterface, MonetaryInterface
{
    public function getBeneficiaryParty(): BeneficiaryAccountInterface;

    public function getChargesInformation(): ChargesInformationInterface;

    public function getDebtorParty(): AccountInterface;

    public function getFx(): FxInterface;

    public function getSponsorParty(): SponsorAccountInterface;
}
