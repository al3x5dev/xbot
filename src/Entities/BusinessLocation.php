<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BusinessLocation Entity
 * @property string $address
 * @property Location $location
 */
class BusinessLocation extends Entity
{
    protected function setEntities(): array
    {
        return [
            'location' => Location::class,
        ];
    }
}
