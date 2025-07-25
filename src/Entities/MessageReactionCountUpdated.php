<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MessageReactionCountUpdated Entity
 * @property Chat $chat
 * @property int $message_id
 * @property int $date
 * @property ReactionCount[] $reactions
 */
class MessageReactionCountUpdated extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'reactions' => [ReactionCount::class],
        ];
    }
}
