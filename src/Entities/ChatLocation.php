<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatLocation Entity
 * @property Location $location
 * @property string $address
 */
class ChatLocation extends Entity
{
    protected function setEntities(): array
    {
        return [
            'location' => Location::class,
        ];
    }
}
