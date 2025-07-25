<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UsersShared Entity
 * @property int $request_id
 * @property SharedUser[] $users
 */
class UsersShared extends Entity
{
    protected function setEntities(): array
    {
        return [
            'users' => [SharedUser::class],
        ];
    }
}
