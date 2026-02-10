<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatFullInfo Entity
 * @property int $id
 * @property string $type
 * @property string $title
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property bool $is_forum
 * @property bool $is_direct_messages
 * @property int $accent_color_id
 * @property int $max_reaction_count
 * @property ChatPhoto $photo
 * @property string $active_usernames
 * @property Birthdate $birthdate
 * @property BusinessIntro $business_intro
 * @property BusinessLocation $business_location
 * @property BusinessOpeningHours $business_opening_hours
 * @property Chat $personal_chat
 * @property Chat $parent_chat
 * @property ReactionType[] $available_reactions
 * @property string $background_custom_emoji_id
 * @property int $profile_accent_color_id
 * @property string $profile_background_custom_emoji_id
 * @property string $emoji_status_custom_emoji_id
 * @property int $emoji_status_expiration_date
 * @property string $bio
 * @property bool $has_private_forwards
 * @property bool $has_restricted_voice_and_video_messages
 * @property bool $join_to_send_messages
 * @property bool $join_by_request
 * @property string $description
 * @property string $invite_link
 * @property Message $pinned_message
 * @property ChatPermissions $permissions
 * @property AcceptedGiftTypes $accepted_gift_types
 * @property bool $can_send_paid_media
 * @property int $slow_mode_delay
 * @property int $unrestrict_boost_count
 * @property int $message_auto_delete_time
 * @property bool $has_aggressive_anti_spam_enabled
 * @property bool $has_hidden_members
 * @property bool $has_protected_content
 * @property bool $has_visible_history
 * @property string $sticker_set_name
 * @property bool $can_set_sticker_set
 * @property string $custom_emoji_sticker_set_name
 * @property int $linked_chat_id
 * @property ChatLocation $location
 * @property UserRating $rating
 * @property Audio $first_profile_audio
 * @property UniqueGiftColors $unique_gift_colors
 * @property int $paid_message_star_count
 */
class ChatFullInfo extends Entity
{
    protected function setEntities(): array
    {
        return [
            'photo' => ChatPhoto::class,
            'birthdate' => Birthdate::class,
            'business_intro' => BusinessIntro::class,
            'business_location' => BusinessLocation::class,
            'business_opening_hours' => BusinessOpeningHours::class,
            'personal_chat' => Chat::class,
            'parent_chat' => Chat::class,
            'available_reactions' => [ReactionType::class],
            'pinned_message' => Message::class,
            'permissions' => ChatPermissions::class,
            'accepted_gift_types' => AcceptedGiftTypes::class,
            'location' => ChatLocation::class,
            'rating' => UserRating::class,
            'first_profile_audio' => Audio::class,
            'unique_gift_colors' => UniqueGiftColors::class,
        ];
    }
}
