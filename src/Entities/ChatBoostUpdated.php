<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatBoostUpdated Entity
 * @property Chat $chat;
 * @property ChatBoost $boost;
 */
class ChatBoostUpdated extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class,
            'boost' => ChatBoost::class,
        ];
    }
}
