<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BusinessBotRights Entity
 * @property bool $can_reply
 * @property bool $can_read_messages
 * @property bool $can_delete_sent_messages
 * @property bool $can_delete_all_messages
 * @property bool $can_edit_name
 * @property bool $can_edit_bio
 * @property bool $can_edit_profile_photo
 * @property bool $can_edit_username
 * @property bool $can_change_gift_settings
 * @property bool $can_view_gifts_and_stars
 * @property bool $can_convert_gifts_to_stars
 * @property bool $can_transfer_and_upgrade_gifts
 * @property bool $can_transfer_stars
 * @property bool $can_manage_stories
 */
class BusinessBotRights extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
