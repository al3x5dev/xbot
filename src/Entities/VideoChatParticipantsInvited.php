<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * VideoChatParticipantsInvited Entity
 * @property User[] $users
 */
class VideoChatParticipantsInvited extends Entity
{
    protected function setEntities(): array
    {
        return [
            'users' => [User::class],
        ];
    }
}
