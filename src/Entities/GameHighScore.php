<?php

namespace Al3x5\xBot\Entities;

/**
 * GameHighScore Entity
 * @property int $position;
 * @property User $user;
 * @property int $score;
 */
class GameHighScore extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
