<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * OrderInfo Entity
 * @property string $name
 * @property string $phone_number
 * @property string $email
 * @property ShippingAddress $shipping_address
 */
class OrderInfo extends Entity
{
    protected function setEntities(): array
    {
        return [
            'shipping_address' => ShippingAddress::class,
        ];
    }
}
