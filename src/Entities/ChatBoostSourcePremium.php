<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatBoostSourcePremium Entity
 * @property string $source;
 * @property User $user;
 */
class ChatBoostSourcePremium extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
