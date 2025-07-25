<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ShippingAddress Entity
 * @property string $country_code
 * @property string $state
 * @property string $city
 * @property string $street_line1
 * @property string $street_line2
 * @property string $post_code
 */
class ShippingAddress extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
