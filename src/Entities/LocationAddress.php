<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * LocationAddress Entity
 * @property string $country_code
 * @property string $state
 * @property string $city
 * @property string $street
 */
class LocationAddress extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
