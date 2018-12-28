<?php

namespace App\Builder;

use App\Api\BeneficiaryAccount;
use App\Api\ChargesInformation;
use App\Api\DebtorAccount;
use App\Api\Fx;
use App\Api\MonetaryAmount;
use App\Api\Payment;
use App\Api\PaymentAttributes;
use App\Api\SponsorAccount;
use App\Entity\TransactionLog;

class PaymentBuilder
{
    public function build(TransactionLog $transactionLog): Payment
    {
        $chargesInformation = $this->buildChargesInformation($transactionLog);
        $beneficiary        = $this->buildBeneficiary($transactionLog);
        $debtor             = $this->buildDebtor($transactionLog);
        $sponsor            = $this->buildSponsor($transactionLog);
        $fx                 = $this->buildFx($transactionLog);

        $attributes = new PaymentAttributes(
            $transactionLog->amount,
            $transactionLog->currency,
            $transactionLog->processingDate->format('Y-m-d H:i:s'),
            $transactionLog->paymentId,
            $transactionLog->paymentPurpose,
            $transactionLog->paymentScheme,
            $transactionLog->paymentType,
            $transactionLog->reference,
            $transactionLog->numericReference,
            $transactionLog->endToEndReference,
            $transactionLog->schemePaymentType,
            $transactionLog->schemePaymentSubType,
            $chargesInformation,
            $beneficiary,
            $debtor,
            $sponsor,
            $fx
        );

        $payment = new Payment(
            $transactionLog->type,
            $transactionLog->version,
            $transactionLog->organisationId,
            $attributes
        );
        $payment->setId($transactionLog->getId());

        return $payment;
    }

    private function buildBeneficiary(TransactionLog $transactionLog): BeneficiaryAccount
    {
        return new BeneficiaryAccount(
            $transactionLog->beneficiaryAccountName,
            $transactionLog->beneficiaryAccountNumber,
            $transactionLog->beneficiaryAccountNumberCode,
            $transactionLog->beneficiaryAddress,
            $transactionLog->beneficiaryName,
            $transactionLog->beneficiaryAccountType,
            $transactionLog->beneficiaryBankId,
            $transactionLog->beneficiaryBankIdCode
        );
    }

    private function buildDebtor(TransactionLog $transactionLog): DebtorAccount
    {
        return new DebtorAccount(
            $transactionLog->debtorAccountName,
            $transactionLog->debtorAccountNumber,
            $transactionLog->debtorAccountNumberCode,
            $transactionLog->debtorAddress,
            $transactionLog->debtorName,
            $transactionLog->debtorBankId,
            $transactionLog->debtorBankIdCode
        );
    }

    private function buildSponsor(TransactionLog $transactionLog): SponsorAccount
    {
        return new SponsorAccount(
            $transactionLog->sponsorAccountNumber,
            $transactionLog->sponsorBankId,
            $transactionLog->sponsorBankIdCode
        );
    }

    private function buildFx(TransactionLog $transactionLog): Fx
    {
        return new Fx(
            $transactionLog->contractReference,
            $transactionLog->exchangeRate,
            $transactionLog->originalAmount,
            $transactionLog->originalCurrency

        );
    }

    private function buildChargesInformation(TransactionLog $transactionLog): ChargesInformation
    {
        return new ChargesInformation(
            $transactionLog->bearerCode,
            $this->buildSenderCharges($transactionLog->senderCharges),
            $transactionLog->receiverChargesAmount,
            $transactionLog->receiverChargesCurrency

        );
    }

    private function buildSenderCharges(array $array): array
    {
        $result = [];
        foreach ($array as $item) {
            $result[] = new MonetaryAmount($item['amount'], $item['currency']);
        }

        return $result;
    }
}