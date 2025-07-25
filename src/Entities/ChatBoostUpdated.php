<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatBoostUpdated Entity
 * @property Chat $chat
 * @property ChatBoost $boost
 */
class ChatBoostUpdated extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'boost' => ChatBoost::class,
        ];
    }
}
