<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(
 *     itemOperations={},
 *     collectionOperations={}
 * )
 */
class MonetaryAmount implements MonetaryInterface
{
    use AmountTrait;

    /**
     * MonetaryAmount constructor.
     *
     * @param string $amount
     * @param string $currency
     */
    public function __construct(string $amount, string $currency)
    {
        $this->amount   = $amount;
        $this->currency = $currency;
    }
}