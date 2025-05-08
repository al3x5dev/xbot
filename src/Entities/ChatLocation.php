<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatLocation Entity
 * @property Location $location;
 * @property string $address;
 */
class ChatLocation extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'location' => Location::class,
        ];
    }
}
