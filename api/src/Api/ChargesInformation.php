<?php

namespace App\Api;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * ...
 * @ApiResource(
 *     collectionOperations={},
 *     itemOperations={}
 * )
 */
class ChargesInformation implements ChargesInformationInterface
{
    /**
     * @var string
     */
    private $bearerCode;

    /**
     * @var MonetaryInterface[]
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *              "type" = "array",
     *              "items" = {"$ref" = "#/definitions/MonetaryAmount"}
     *         }
     *     }
     * )
     */
    private $senderCharges;

    /**
     * @var string
     */
    private $receiverChargesAmount;

    /**
     * @var string
     */
    private $receiverChargesCurrency;

    /**
     * ChargesInformation constructor.
     *
     * @param string              $bearerCode
     * @param MonetaryInterface[] $senderCharges
     * @param string              $receiverChargesAmount
     * @param string              $receiverChargesCurrency
     */
    public function __construct(
        string $bearerCode,
        array $senderCharges,
        string $receiverChargesAmount,
        string $receiverChargesCurrency
    ) {
        $this->bearerCode              = $bearerCode;
        $this->senderCharges           = $senderCharges;
        $this->receiverChargesAmount   = $receiverChargesAmount;
        $this->receiverChargesCurrency = $receiverChargesCurrency;
    }

    public function getBearerCode(): string
    {
        return $this->bearerCode;
    }

    public function getSenderCharges(): array
    {
        return $this->senderCharges;
    }

    public function getReceiverChargesAmount(): string
    {
        return $this->receiverChargesAmount;
    }

    public function getReceiverChargesCurrency(): string
    {
        return $this->receiverChargesCurrency;
    }

    public function setBearerCode(string $bearerCode): ChargesInformationInterface
    {
        $this->bearerCode = $bearerCode;

        return $this;
    }

    public function setSenderCharges(array $monetaryCollection): ChargesInformationInterface
    {
        $this->senderCharges = $monetaryCollection;

        return $this;
    }

    public function setReceiverChargesAmount(string $receiverChargesAmount): ChargesInformationInterface
    {
        $this->receiverChargesAmount = $receiverChargesAmount;

        return $this;
    }

    public function setReceiverChargesCurrency(string $receiverChargesCurrency): ChargesInformationInterface
    {
        $this->receiverChargesCurrency = $receiverChargesCurrency;

        return $this;
    }


}