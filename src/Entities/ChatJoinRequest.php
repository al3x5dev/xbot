<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatJoinRequest Entity
 * @property Chat $chat
 * @property User $from
 * @property int $user_chat_id
 * @property int $date
 * @property string $bio
 * @property ChatInviteLink $invite_link
 */
class ChatJoinRequest extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'from' => User::class,
            'invite_link' => ChatInviteLink::class,
        ];
    }
}
