<?php

namespace Al3x5\xBot\Entities;

/**
 * ProximityAlertTriggered Entity
 * @property User $traveler;
 * @property User $watcher;
 * @property int $distance;
 */
class ProximityAlertTriggered extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'traveler' => User::class,
            'watcher' => User::class,
        ];
    }
}
