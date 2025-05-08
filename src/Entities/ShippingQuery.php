<?php

namespace Al3x5\xBot\Entities;

/**
 * ShippingQuery Entity
 * @property string $id;
 * @property User $from;
 * @property string $invoice_payload;
 * @property ShippingAddress $shipping_address;
 */
class ShippingQuery extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'from' => User::class,
            'shipping_address' => ShippingAddress::class,
        ];
    }
}
