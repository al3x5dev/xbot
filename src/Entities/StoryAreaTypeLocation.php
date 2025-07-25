<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * StoryAreaTypeLocation Entity
 * @property string $type
 * @property float $latitude
 * @property float $longitude
 * @property LocationAddress $address
 */
class StoryAreaTypeLocation extends Entity
{
    protected function setEntities(): array
    {
        return [
            'address' => LocationAddress::class,
        ];
    }
}
