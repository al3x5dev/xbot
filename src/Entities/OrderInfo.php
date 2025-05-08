<?php

namespace Al3x5\xBot\Entities;

/**
 * OrderInfo Entity
 * @property string $name;
 * @property string $phone_number;
 * @property string $email;
 * @property ShippingAddress $shipping_address;
 */
class OrderInfo extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'shipping_address' => ShippingAddress::class,
        ];
    }
}
