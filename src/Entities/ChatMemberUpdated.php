<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatMemberUpdated Entity
 * @property Chat $chat;
 * @property User $from;
 * @property int $date;
 * @property ChatMember $old_chat_member;
 * @property ChatMember $new_chat_member;
 * @property ChatInviteLink $invite_link;
 * @property bool $via_join_request;
 * @property bool $via_chat_folder_invite_link;
 */
class ChatMemberUpdated extends EntityBase
{
    protected function getEntities(): array
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
