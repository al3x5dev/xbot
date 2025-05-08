<?php

namespace Al3x5\xBot\Entities;

/**
 * LocationAddress Entity
 * @property string $country_code;
 * @property string $state;
 * @property string $city;
 * @property string $street;
 */
class LocationAddress extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
