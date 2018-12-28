<?php

namespace App\Tests\DataProviders;

use App\Entity\TransactionLog;

class TransactionLogItem
{

    /**
     * Dummy TransactionLog object to use in tests
     *
     * @return TransactionLog
     */
    public static function object(): TransactionLog
    {
        $jsonString           = '{"id":"5c261690b9017","type":"Payment","version":0,"organisationId":"743d5b63-8e6f-432e-a8fa-c5d8d2ee5fcb","processingDate":{"date":"2017-01-18 00:00:00.000000","timezone_type":3,"timezone":"UTC"},"amount":"100.21","currency":"GBP","paymentId":"123456789012345678","paymentPurpose":"Paying for goods\/services","paymentScheme":"FPS","paymentType":"Credit","reference":"Payment for Em\'s piano lessons","numericReference":"1002001","endToEndReference":"Wil piano Jan","schemePaymentType":"ImmediatePayment","schemePaymentSubType":"InternetBanking","beneficiaryAccountType":0,"beneficiaryAccountName":"W Owens","beneficiaryAccountNumber":"31926819","beneficiaryAccountNumberCode":"BBAN","beneficiaryAddress":"1 The Beneficiary Localtown SE2","beneficiaryName":"Wilfred Jeremiah Owens","beneficiaryBankId":"403000","beneficiaryBankIdCode":"GBDSC","debtorAccountName":"EJ Brown Black","debtorAccountNumber":"GB29XABC10161234567801","debtorAccountNumberCode":"IBAN","debtorAddress":"10 Debtor Crescent Sourcetown NE1","debtorName":"Emelia Jane Brown","debtorBankId":"203301","debtorBankIdCode":"GBDSC","sponsorAccountNumber":"56781234","sponsorBankId":"123123","sponsorBankIdCode":"GBDSC","contractReference":"FX123","exchangeRate":"2.00000","originalAmount":"200.42","originalCurrency":"USD","bearerCode":"SHAR","senderCharges":[],"receiverChargesAmount":"1.00","receiverChargesCurrency":"USD","createdAt":{"date":"2018-12-28 12:36:42.703606","timezone_type":3,"timezone":"UTC"},"updatedAt":{"date":"2018-12-28 12:36:42.703611","timezone_type":3,"timezone":"UTC"},"deletedAt":null}';
        $json                 = \json_decode($jsonString);
        $json->processingDate = new \DateTime('2018-01-01 00:00:00');
        $json->senderCharges  = [['amount' => '0.50', 'currency' => 'USD'], ['amount' => '0.50', 'currency' => 'USD']];
        $json->createdAt      = new \DateTime('2018-01-01 00:00:00');
        $json->updatedAt      = new \DateTime('2018-01-01 02:00:00');

        $entity = new TransactionLog();
        $entity->setId($json->id);
        $entity->type                         = $json->type;
        $entity->organisationId               = $json->organisationId;
        $entity->version                      = $json->version;
        $entity->processingDate               = $json->processingDate;
        $entity->amount                       = $json->amount;
        $entity->currency                     = $json->currency;
        $entity->paymentId                    = $json->paymentId;
        $entity->paymentPurpose               = $json->paymentPurpose;
        $entity->paymentScheme                = $json->paymentScheme;
        $entity->paymentType                  = $json->paymentType;
        $entity->reference                    = $json->reference;
        $entity->numericReference             = $json->numericReference;
        $entity->endToEndReference            = $json->endToEndReference;
        $entity->schemePaymentType            = $json->schemePaymentType;
        $entity->schemePaymentSubType         = $json->schemePaymentSubType;
        $entity->beneficiaryAccountType       = $json->beneficiaryAccountType;
        $entity->beneficiaryName              = $json->beneficiaryName;
        $entity->beneficiaryAccountName       = $json->beneficiaryAccountName;
        $entity->beneficiaryAccountNumber     = $json->beneficiaryAccountNumber;
        $entity->beneficiaryAccountNumberCode = $json->beneficiaryAccountNumberCode;
        $entity->beneficiaryAddress           = $json->beneficiaryAddress;
        $entity->beneficiaryBankId            = $json->beneficiaryBankId;
        $entity->beneficiaryBankIdCode        = $json->beneficiaryBankIdCode;
        $entity->debtorName                   = $json->debtorName;
        $entity->debtorAccountName            = $json->debtorAccountName;
        $entity->debtorAccountNumber          = $json->debtorAccountNumber;
        $entity->debtorAccountNumberCode      = $json->debtorAccountNumberCode;
        $entity->debtorAddress                = $json->debtorAddress;
        $entity->debtorBankId                 = $json->debtorBankId;
        $entity->debtorBankIdCode             = $json->debtorBankIdCode;
        $entity->sponsorAccountNumber         = $json->sponsorAccountNumber;
        $entity->sponsorBankId                = $json->sponsorBankId;
        $entity->sponsorBankIdCode            = $json->sponsorBankIdCode;
        $entity->contractReference            = $json->contractReference;
        $entity->exchangeRate                 = $json->exchangeRate;
        $entity->originalAmount               = $json->originalAmount;
        $entity->originalCurrency             = $json->originalCurrency;
        $entity->bearerCode                   = $json->bearerCode;
        $entity->receiverChargesAmount        = $json->receiverChargesAmount;
        $entity->receiverChargesCurrency      = $json->receiverChargesCurrency;
        $entity->senderCharges                = $json->senderCharges;
        $entity->createdAt                    = $json->createdAt;
        $entity->updatedAt                    = $json->updatedAt;

        return $entity;
    }
}
