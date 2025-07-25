<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Venue Entity
 * @property Location $location
 * @property string $title
 * @property string $address
 * @property string $foursquare_id
 * @property string $foursquare_type
 * @property string $google_place_id
 * @property string $google_place_type
 */
class Venue extends Entity
{
    protected function setEntities(): array
    {
        return [
            'location' => Location::class,
        ];
    }
}
