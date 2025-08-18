<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * DirectMessagesTopic Entity
 * @property int $topic_id
 * @property User $user
 */
class DirectMessagesTopic extends Entity
{
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
