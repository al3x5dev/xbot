<?php

namespace Al3x5\xBot\Entities;

/**
 * Message Entity
 * 
 * @property public int $message_id
 * @property public int $message_thread_id
 * @property public User  $from
 * @property public Chat $sender_chat
 * @property public int $sender_boost_count
 * @property public User  $sender_business_bot
 * @property public int $date
 * @property public string $business_connection_id
 * @property public Chat $chat
 * @property public MessageOrigin $forward_origin
 * @property public bool $is_topic_message
 * @property public bool $is_automatic_forward
 * @property public Message $reply_to_message
 * @property public ExternalReplyInfo $external_reply
 * @property public Story $reply_to_story
 * @property public User  $via_bot
 * @property public int $edit_date
 * @property public bool $has_protected_content
 * @property public bool $is_from_offline
 * @property public string $media_group_id
 * @property public string $author_signature
 * @property public string $text
 * @property public array|MessageEntity $entities
 * @property public LinkPreviewOptions $link_preview_options
 * @property public string $effect_id
 * @property public Animation $animation
 * @property public Audio $audio
 * @property public Document $document
 * @property public PaidMediaInfo $paid_media
 * @property public array|PhotoSize $photo
 * @property public Sticker $sticker
 * @property public Story $story
 * @property public Video $video
 * @property public VideoNote $video_note
 * @property public Voice $voice
 * @property public string $caption
 * @property public array|MessageEntity $caption_entities
 * @property public bool $show_caption_above_media
 * @property public bool $has_media_spoiler
 * @property public Contact $contact
 * @property public Dice $dice
 * @property public Game $game
 * @property public Poll $poll
 * @property public Venue $venue
 * @property public Location $location
 * @property public array|User $new_chat_members
 * @property public User  $left_chat_member
 * @property public string $new_chat_title
 * @property public array|PhotoSize $new_chat_photo
 * @property public bool $delete_chat_photo
 * @property public bool $group_chat_created
 * @property public bool $supergroup_chat_created
 * @property public bool $channel_chat_created
 * @property public MessageAutoDeleteTimerChanged $message_auto_delete_timer_changed
 * @property public int $migrate_to_chat_id
 * @property public int $migrate_from_chat_id
 * @property public MaybeInaccessibleMessage $pinned_message
 * @property public Invoice $invoice
 * @property public SuccessfulPayment $successful_payment
 * @property public RefundedPayment $refunded_payment
 * @property public UsersShared $users_shared
 * @property public ChatShared $chat_shared
 * @property public string $connected_website
 * @property public WriteAccessAllowed $write_access_allowed
 * @property public PassportData $passport_data
 * @property public ProximityAlertTriggered $proximity_alert_triggered
 * @property public ChatBoostAdded $boost_added
 * @property public ChatBackground $chat_background_set
 * @property public ForumTopicCreated $forum_topic_created
 * @property public ForumTopicEdited $forum_topic_edited
 * @property public ForumTopicClosed $forum_topic_closed
 * @property public ForumTopicReopened $forum_topic_reopened
 * @property public GeneralForumTopicHidden $general_forum_topic_hidden
 * @property public GeneralForumTopicUnhidden $general_forum_topic_unhidden
 * @property public GiveawayCreated $giveaway_created
 * @property public Giveaway $giveaway
 * @property public GiveawayWinners $giveaway_winners
 * @property public GiveawayCompleted $giveaway_completed
 * @property public VideoChatScheduled $video_chat_scheduled
 * @property public VideoChatStarted $video_chat_started
 * @property public VideoChatEnded $video_chat_ended
 * @property public VideoChatParticipantsInvited $video_chat_participants_invited
 * @property public WebAppData $web_app_data
 * @property public InlineKeyboardMarkup $reply_markup
 */
class Message extends Base
{
    protected function getEntities(): array
    {
        return [
            'from' => User::class,
            'chat' => Chat::class,
            'entities' => MessageEntity::class,
        ];
    }

    /**
     * 
     */
    public function isCommand(): bool
    {
        if (isset($this->entities)) {
            return $this->__get('entities')->__get('type') === 'bot_command';
        }

        return false;
    }
}
