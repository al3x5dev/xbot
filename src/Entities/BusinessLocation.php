<?php

namespace Al3x5\xBot\Entities;

/**
 * BusinessLocation Entity
 * @property string $address;
 * @property Location $location;
 */
class BusinessLocation extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'location' => Location::class,
        ];
    }
}
