<?php

namespace Al3x5\xBot\Entities;

/**
 * ShippingAddress Entity
 * @property string $country_code;
 * @property string $state;
 * @property string $city;
 * @property string $street_line1;
 * @property string $street_line2;
 * @property string $post_code;
 */
class ShippingAddress extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
