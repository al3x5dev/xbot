<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UserChatBoosts Entity
 * @property ChatBoost[] $boosts
 */
class UserChatBoosts extends Entity
{
    protected function setEntities(): array
    {
        return [
            'boosts' => [ChatBoost::class],
        ];
    }
}
