<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatMemberUpdated Entity
 * @property Chat $chat
 * @property User $from
 * @property int $date
 * @property ChatMember $old_chat_member
 * @property ChatMember $new_chat_member
 * @property ChatInviteLink $invite_link
 * @property bool $via_join_request
 * @property bool $via_chat_folder_invite_link
 */
class ChatMemberUpdated extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'from' => User::class,
            'old_chat_member' => ChatMember::class,
            'new_chat_member' => ChatMember::class,
            'invite_link' => ChatInviteLink::class,
        ];
    }
}
