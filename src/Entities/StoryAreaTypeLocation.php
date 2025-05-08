<?php

namespace Al3x5\xBot\Entities;

/**
 * StoryAreaTypeLocation Entity
 * @property string $type;
 * @property float $latitude;
 * @property float $longitude;
 * @property LocationAddress $address;
 */
class StoryAreaTypeLocation extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'address' => LocationAddress::class,
        ];
    }
}
