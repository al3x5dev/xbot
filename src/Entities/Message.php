<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Message Entity
 * @property int $message_id
 * @property int $message_thread_id
 * @property DirectMessagesTopic $direct_messages_topic
 * @property User $from
 * @property Chat $sender_chat
 * @property int $sender_boost_count
 * @property User $sender_business_bot
 * @property int $date
 * @property string $business_connection_id
 * @property Chat $chat
 * @property MessageOrigin $forward_origin
 * @property bool $is_topic_message
 * @property bool $is_automatic_forward
 * @property Message $reply_to_message
 * @property ExternalReplyInfo $external_reply
 * @property TextQuote $quote
 * @property Story $reply_to_story
 * @property int $reply_to_checklist_task_id
 * @property User $via_bot
 * @property int $edit_date
 * @property bool $has_protected_content
 * @property bool $is_from_offline
 * @property bool $is_paid_post
 * @property string $media_group_id
 * @property string $author_signature
 * @property int $paid_star_count
 * @property string $text
 * @property MessageEntity[] $entities
 * @property LinkPreviewOptions $link_preview_options
 * @property SuggestedPostInfo $suggested_post_info
 * @property string $effect_id
 * @property Animation $animation
 * @property Audio $audio
 * @property Document $document
 * @property PaidMediaInfo $paid_media
 * @property PhotoSize[] $photo
 * @property Sticker $sticker
 * @property Story $story
 * @property Video $video
 * @property VideoNote $video_note
 * @property Voice $voice
 * @property string $caption
 * @property MessageEntity[] $caption_entities
 * @property bool $show_caption_above_media
 * @property bool $has_media_spoiler
 * @property Checklist $checklist
 * @property Contact $contact
 * @property Dice $dice
 * @property Game $game
 * @property Poll $poll
 * @property Venue $venue
 * @property Location $location
 * @property User[] $new_chat_members
 * @property User $left_chat_member
 * @property ChatOwnerLeft $chat_owner_left
 * @property ChatOwnerChanged $chat_owner_changed
 * @property string $new_chat_title
 * @property PhotoSize[] $new_chat_photo
 * @property bool $delete_chat_photo
 * @property bool $group_chat_created
 * @property bool $supergroup_chat_created
 * @property bool $channel_chat_created
 * @property MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed
 * @property int $migrate_to_chat_id
 * @property int $migrate_from_chat_id
 * @property MaybeInaccessibleMessage $pinned_message
 * @property Invoice $invoice
 * @property SuccessfulPayment $successful_payment
 * @property RefundedPayment $refunded_payment
 * @property UsersShared $users_shared
 * @property ChatShared $chat_shared
 * @property GiftInfo $gift
 * @property UniqueGiftInfo $unique_gift
 * @property GiftInfo $gift_upgrade_sent
 * @property string $connected_website
 * @property WriteAccessAllowed $write_access_allowed
 * @property PassportData $passport_data
 * @property ProximityAlertTriggered $proximity_alert_triggered
 * @property ChatBoostAdded $boost_added
 * @property ChatBackground $chat_background_set
 * @property ChecklistTasksDone $checklist_tasks_done
 * @property ChecklistTasksAdded $checklist_tasks_added
 * @property DirectMessagePriceChanged $direct_message_price_changed
 * @property ForumTopicCreated $forum_topic_created
 * @property ForumTopicEdited $forum_topic_edited
 * @property ForumTopicClosed $forum_topic_closed
 * @property ForumTopicReopened $forum_topic_reopened
 * @property GeneralForumTopicHidden $general_forum_topic_hidden
 * @property GeneralForumTopicUnhidden $general_forum_topic_unhidden
 * @property GiveawayCreated $giveaway_created
 * @property Giveaway $giveaway
 * @property GiveawayWinners $giveaway_winners
 * @property GiveawayCompleted $giveaway_completed
 * @property PaidMessagePriceChanged $paid_message_price_changed
 * @property SuggestedPostApproved $suggested_post_approved
 * @property SuggestedPostApprovalFailed $suggested_post_approval_failed
 * @property SuggestedPostDeclined $suggested_post_declined
 * @property SuggestedPostPaid $suggested_post_paid
 * @property SuggestedPostRefunded $suggested_post_refunded
 * @property VideoChatScheduled $video_chat_scheduled
 * @property VideoChatStarted $video_chat_started
 * @property VideoChatEnded $video_chat_ended
 * @property VideoChatParticipantsInvited $video_chat_participants_invited
 * @property WebAppData $web_app_data
 * @property InlineKeyboardMarkup $reply_markup
 */
class Message extends Entity
{
    protected function setEntities(): array
    {
        return [
            'direct_messages_topic' => DirectMessagesTopic::class,
            'from' => User::class,
            'sender_chat' => Chat::class,
            'sender_business_bot' => User::class,
            'chat' => Chat::class,
            'forward_origin' => MessageOrigin::class,
            'reply_to_message' => Message::class,
            'external_reply' => ExternalReplyInfo::class,
            'quote' => TextQuote::class,
            'reply_to_story' => Story::class,
            'via_bot' => User::class,
            'entities' => [MessageEntity::class],
            'link_preview_options' => LinkPreviewOptions::class,
            'suggested_post_info' => SuggestedPostInfo::class,
            'animation' => Animation::class,
            'audio' => Audio::class,
            'document' => Document::class,
            'paid_media' => PaidMediaInfo::class,
            'photo' => [PhotoSize::class],
            'sticker' => Sticker::class,
            'story' => Story::class,
            'video' => Video::class,
            'video_note' => VideoNote::class,
            'voice' => Voice::class,
            'caption_entities' => [MessageEntity::class],
            'checklist' => Checklist::class,
            'contact' => Contact::class,
            'dice' => Dice::class,
            'game' => Game::class,
            'poll' => Poll::class,
            'venue' => Venue::class,
            'location' => Location::class,
            'new_chat_members' => [User::class],
            'left_chat_member' => User::class,
            'chat_owner_left' => ChatOwnerLeft::class,
            'chat_owner_changed' => ChatOwnerChanged::class,
            'new_chat_photo' => [PhotoSize::class],
            'message_auto_delete_timer_changed' => MessageAutoDeleteTimerChanged::class,
            'pinned_message' => MaybeInaccessibleMessage::class,
            'invoice' => Invoice::class,
            'successful_payment' => SuccessfulPayment::class,
            'refunded_payment' => RefundedPayment::class,
            'users_shared' => UsersShared::class,
            'chat_shared' => ChatShared::class,
            'gift' => GiftInfo::class,
            'unique_gift' => UniqueGiftInfo::class,
            'gift_upgrade_sent' => GiftInfo::class,
            'write_access_allowed' => WriteAccessAllowed::class,
            'passport_data' => PassportData::class,
            'proximity_alert_triggered' => ProximityAlertTriggered::class,
            'boost_added' => ChatBoostAdded::class,
            'chat_background_set' => ChatBackground::class,
            'checklist_tasks_done' => ChecklistTasksDone::class,
            'checklist_tasks_added' => ChecklistTasksAdded::class,
            'direct_message_price_changed' => DirectMessagePriceChanged::class,
            'forum_topic_created' => ForumTopicCreated::class,
            'forum_topic_edited' => ForumTopicEdited::class,
            'forum_topic_closed' => ForumTopicClosed::class,
            'forum_topic_reopened' => ForumTopicReopened::class,
            'general_forum_topic_hidden' => GeneralForumTopicHidden::class,
            'general_forum_topic_unhidden' => GeneralForumTopicUnhidden::class,
            'giveaway_created' => GiveawayCreated::class,
            'giveaway' => Giveaway::class,
            'giveaway_winners' => GiveawayWinners::class,
            'giveaway_completed' => GiveawayCompleted::class,
            'paid_message_price_changed' => PaidMessagePriceChanged::class,
            'suggested_post_approved' => SuggestedPostApproved::class,
            'suggested_post_approval_failed' => SuggestedPostApprovalFailed::class,
            'suggested_post_declined' => SuggestedPostDeclined::class,
            'suggested_post_paid' => SuggestedPostPaid::class,
            'suggested_post_refunded' => SuggestedPostRefunded::class,
            'video_chat_scheduled' => VideoChatScheduled::class,
            'video_chat_started' => VideoChatStarted::class,
            'video_chat_ended' => VideoChatEnded::class,
            'video_chat_participants_invited' => VideoChatParticipantsInvited::class,
            'web_app_data' => WebAppData::class,
            'reply_markup' => InlineKeyboardMarkup::class,
        ];
    }

    public function isCommand(): bool
{
    if ($this->hasProperty('entities')) {
        foreach ($this->entities as $entity) {
            if ($entity->type === 'bot_command') {
                return true;
            }
        }
    }
    return false;
}
}
