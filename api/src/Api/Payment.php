<?php

namespace App\Api;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 */
class Payment implements PaymentInterface
{
    /**
     * @var string
     *
     * @ApiProperty(identifier=true)
     *
     */
    private $id;

    /**
     * @var string
     *
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
     * @Assert\NotBlank
     */
    private $version = 0;

    /**
     * @var string
     *
     * @Assert\NotBlank
     * @ApiProperty(
     *
     * )
     */
    private $organisationId;

    /**
     * @var PaymentAttributes Attributes
     *
     * @Assert\NotBlank
     * @ApiProperty(
     *     iri="false",
     *     attributes={
     *         "swagger_context"={
     *              "$ref" = "#/definitions/PaymentAttributes"
     *         }
     *     }
     * )
     */
    private $attributes;

    /**
     * PaymentAttributes constructor.
     *
     * @param string                     $type
     * @param int                        $version
     * @param string                     $organisationId
     * @param PaymentAttributesInterface $attributes
     */
    public function __construct(
        string $type,
        int $version,
        string $organisationId,
        PaymentAttributes $attributes
    ) {
        $this->id             = \uniqid();
        $this->type           = $type;
        $this->version        = $version;
        $this->organisationId = $organisationId;
        $this->attributes     = $attributes;
    }

    public function getId(): ?string
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
        return $this->organisationId;
    }

    public function getAttributes(): PaymentAttributesInterface
    {
        return $this->attributes;
    }

    public function setType(string $type): PaymentInterface
    {
        $this->type = $type;

        return $this;
    }

    public function setId(string $id): PaymentInterface
    {
        $this->id = $id;

        return $this;
    }

    public function setVersion(int $version): PaymentInterface
    {
        $this->version = $version;

        return $this;
    }

    public function setOrganisationId(string $organisationId): PaymentInterface
    {
        $this->organisationId = $organisationId;

        return $this;
    }

    public function setAttributes(PaymentAttributesInterface $attributes): PaymentInterface
    {
        $this->attributes = $attributes;

        return $this;
    }
}
