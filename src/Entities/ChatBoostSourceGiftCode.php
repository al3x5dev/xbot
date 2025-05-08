<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatBoostSourceGiftCode Entity
 * @property string $source;
 * @property User $user;
 */
class ChatBoostSourceGiftCode extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
