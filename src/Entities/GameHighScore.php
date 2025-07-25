<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * GameHighScore Entity
 * @property int $position
 * @property User $user
 * @property int $score
 */
class GameHighScore extends Entity
{
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
