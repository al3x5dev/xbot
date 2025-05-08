<?php

namespace Al3x5\xBot\Entities;

/**
 * BusinessConnection Entity
 * @property string $id;
 * @property User $user;
 * @property int $user_chat_id;
 * @property int $date;
 * @property BusinessBotRights $rights;
 * @property bool $is_enabled;
 */
class BusinessConnection extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
            'rights' => BusinessBotRights::class,
        ];
    }
}
