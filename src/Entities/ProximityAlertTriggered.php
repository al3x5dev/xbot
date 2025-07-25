<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ProximityAlertTriggered Entity
 * @property User $traveler
 * @property User $watcher
 * @property int $distance
 */
class ProximityAlertTriggered extends Entity
{
    protected function setEntities(): array
    {
        return [
            'traveler' => User::class,
            'watcher' => User::class,
        ];
    }
}
