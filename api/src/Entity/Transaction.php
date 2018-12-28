<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     shortName="Payment"
 * )
 */
class Transaction implements TransactionInterface
{
    /**
     * @var string
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column
     * @Assert\NotBlank
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *             "type"="string",
     *             "enum"={"payment"},
     *             "example"="payment"
     *         }
     *     }
     * )
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $version = 0;

    /**
     * @var string
     *
     * @ORM\Column
     * @Assert\NotBlank
     * @ApiProperty(
     *
     * )
     */
    private $organizationId;

    /**
     * @var PaymentAttributesInterface Payment Attributes
     *
     * @Assert\NotBlank
     * @ApiProperty(
     *     attributes={
     *         "swagger_context"={
     *              "$ref" = "#/definitions/PaymentAttributes"
     *         }
     *     }
     * )
     */
    private $attributes;

    /**
     * Payment constructor.
     *
     * @param string                     $id
     * @param string                     $type
     * @param int                        $version
     * @param string                     $organizationId
     * @param PaymentAttributesInterface $attributes
     */
    public function __construct(
        string $id,
        string $type,
        int $version,
        string $organizationId,
        PaymentAttributesInterface $attributes
    ) {
        $this->id             = $id;
        $this->type           = $type;
        $this->version        = $version;
        $this->organizationId = $organizationId;
        $this->attributes     = $attributes;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function getOrganisationId(): string
    {
        return $this->organizationId;
    }

    public function getAttributes(): PaymentAttributesInterface
    {
        return $this->attributes;
    }

    public function setType(string $type): TransactionInterface
    {
        $this->type = $type;

        return $this;
    }

    public function setId(string $id): TransactionInterface
    {
        $this->id = $id;

        return $this;
    }

    public function setVersion(int $version): TransactionInterface
    {
        $this->version = $version;

        return $this;
    }

    public function setOrganisationId(string $organisationId): TransactionInterface
    {
        $this->organizationId = $organisationId;

        return $this;
    }

    public function setAttributes(PaymentAttributesInterface $attributes): TransactionInterface
    {
        $this->attributes = $attributes;

        return $this;
    }

}
