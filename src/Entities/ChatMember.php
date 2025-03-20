<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatMember class
 * 
 * @property User $user;
 * @property string $status;
 * @property string|null $custom_title;
 * @property bool|null $is_anonymous;
 * @property int|null $until_date;
 * @property bool|null $can_be_edited;
 * @property bool|null $can_post_messages;
 * @property bool|null $can_edit_messages;
 * @property bool|null $can_delete_messages;
 * @property bool|null $can_restrict_members;
 * @property bool|null $can_promote_members;
 * @property bool|null $can_change_info;
 * @property bool|null $can_invite_users;
 * @property bool|null $can_pin_messages;
 * @property bool|null $is_member;
 * @property bool|null $can_send_messages;
 * @property bool|null $can_send_media_messages;
 * @property bool|null $can_send_polls;
 * @property bool|null $can_send_other_messages;
 * @property bool|null $can_add_web_page_previews;
 */
class ChatMember extends Base
{
    public function getEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}