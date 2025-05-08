<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatFullInfo Entity
 * @property int $id;
 * @property string $type;
 * @property string $title;
 * @property string $username;
 * @property string $first_name;
 * @property string $last_name;
 * @property bool $is_forum;
 * @property int $accent_color_id;
 * @property int $max_reaction_count;
 * @property ChatPhoto $photo;
 * @property array $active_usernames;
 * @property Birthdate $birthdate;
 * @property BusinessIntro $business_intro;
 * @property BusinessLocation $business_location;
 * @property BusinessOpeningHours $business_opening_hours;
 * @property Chat $personal_chat;
 * @property \ReactionType[] $available_reactions;
 * @property string $background_custom_emoji_id;
 * @property int $profile_accent_color_id;
 * @property string $profile_background_custom_emoji_id;
 * @property string $emoji_status_custom_emoji_id;
 * @property int $emoji_status_expiration_date;
 * @property string $bio;
 * @property bool $has_private_forwards;
 * @property bool $has_restricted_voice_and_video_messages;
 * @property bool $join_to_send_messages;
 * @property bool $join_by_request;
 * @property string $description;
 * @property string $invite_link;
 * @property Message $pinned_message;
 * @property ChatPermissions $permissions;
 * @property AcceptedGiftTypes $accepted_gift_types;
 * @property bool $can_send_paid_media;
 * @property int $slow_mode_delay;
 * @property int $unrestrict_boost_count;
 * @property int $message_auto_delete_time;
 * @property bool $has_aggressive_anti_spam_enabled;
 * @property bool $has_hidden_members;
 * @property bool $has_protected_content;
 * @property bool $has_visible_history;
 * @property string $sticker_set_name;
 * @property bool $can_set_sticker_set;
 * @property string $custom_emoji_sticker_set_name;
 * @property int $linked_chat_id;
 * @property ChatLocation $location;
 */
class ChatFullInfo extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'photo' => ChatPhoto::class,
            'birthdate' => Birthdate::class,
            'business_intro' => BusinessIntro::class,
            'business_location' => BusinessLocation::class,
            'business_opening_hours' => BusinessOpeningHours::class,
            'personal_chat' => Chat::class,
            'pinned_message' => Message::class,
            'permissions' => ChatPermissions::class,
            'accepted_gift_types' => AcceptedGiftTypes::class,
            'location' => ChatLocation::class,
        ];
    }
}
