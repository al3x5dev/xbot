<?php

namespace Al3x5\xBot\Entities;

/**
 * MessageReactionUpdated Entity
 * @property Chat $chat;
 * @property int $message_id;
 * @property User $user;
 * @property Chat $actor_chat;
 * @property int $date;
 * @property \ReactionType[] $old_reaction;
 * @property \ReactionType[] $new_reaction;
 */
class MessageReactionUpdated extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class,
            'user' => User::class,
            'actor_chat' => Chat::class,
        ];
    }
}
