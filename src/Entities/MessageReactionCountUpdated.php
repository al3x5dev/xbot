<?php

namespace Al3x5\xBot\Entities;

/**
 * MessageReactionCountUpdated Entity
 * @property Chat $chat;
 * @property int $message_id;
 * @property int $date;
 * @property \ReactionCount[] $reactions;
 */
class MessageReactionCountUpdated extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
