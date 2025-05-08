<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatJoinRequest Entity
 * @property Chat $chat;
 * @property User $from;
 * @property int $user_chat_id;
 * @property int $date;
 * @property string $bio;
 * @property ChatInviteLink $invite_link;
 */
class ChatJoinRequest extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class,
            'from' => User::class,
            'invite_link' => ChatInviteLink::class,
        ];
    }
}
