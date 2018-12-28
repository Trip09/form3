<?php

namespace App\Entity;

interface PaymentInterface extends PaymentAttributesInterface, MonetaryInterface
{
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
