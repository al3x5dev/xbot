<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Birthdate Entity
 * @property int $day
 * @property int $month
 * @property int $year
 */
class Birthdate extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
