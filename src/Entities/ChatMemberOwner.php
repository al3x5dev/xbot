<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatMemberOwner Entity
 * @property string $status;
 * @property User $user;
 * @property bool $is_anonymous;
 * @property string $custom_title;
 */
class ChatMemberOwner extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
