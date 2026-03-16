<?php

namespace Al3x5\xBot\Telegram;

use Al3x5\xBot\Telegram\ApiClient;
use Al3x5\xBot\Telegram\Entities\InputFile;
use Al3x5\xBot\Telegram\Entities\MessageEntity;
use Al3x5\xBot\Telegram\Entities\LinkPreviewOptions;
use Al3x5\xBot\Telegram\Entities\SuggestedPostParameters;
use Al3x5\xBot\Telegram\Entities\ReplyParameters;
use Al3x5\xBot\Telegram\Entities\InlineKeyboardMarkup;
use Al3x5\xBot\Telegram\Entities\ReplyKeyboardMarkup;
use Al3x5\xBot\Telegram\Entities\ReplyKeyboardRemove;
use Al3x5\xBot\Telegram\Entities\ForceReply;
use Al3x5\xBot\Telegram\Entities\InputPaidMedia;
use Al3x5\xBot\Telegram\Entities\InputMediaAudio;
use Al3x5\xBot\Telegram\Entities\InputMediaDocument;
use Al3x5\xBot\Telegram\Entities\InputMediaPhoto;
use Al3x5\xBot\Telegram\Entities\InputMediaVideo;
use Al3x5\xBot\Telegram\Entities\InputPollOption;
use Al3x5\xBot\Telegram\Entities\InputChecklist;
use Al3x5\xBot\Telegram\Entities\ReactionType;
use Al3x5\xBot\Telegram\Entities\ChatPermissions;
use Al3x5\xBot\Telegram\Entities\BotCommand;
use Al3x5\xBot\Telegram\Entities\BotCommandScope;
use Al3x5\xBot\Telegram\Entities\InputProfilePhoto;
use Al3x5\xBot\Telegram\Entities\MenuButton;
use Al3x5\xBot\Telegram\Entities\ChatAdministratorRights;
use Al3x5\xBot\Telegram\Entities\AcceptedGiftTypes;
use Al3x5\xBot\Telegram\Entities\InputStoryContent;
use Al3x5\xBot\Telegram\Entities\StoryArea;
use Al3x5\xBot\Telegram\Entities\InputMedia;
use Al3x5\xBot\Telegram\Entities\InputSticker;
use Al3x5\xBot\Telegram\Entities\MaskPosition;
use Al3x5\xBot\Telegram\Entities\InlineQueryResult;
use Al3x5\xBot\Telegram\Entities\InlineQueryResultsButton;
use Al3x5\xBot\Telegram\Entities\LabeledPrice;
use Al3x5\xBot\Telegram\Entities\ShippingOption;
use Al3x5\xBot\Telegram\Entities\PassportElementError;
use Al3x5\xBot\Telegram\Entities\Story;
use Al3x5\xBot\Telegram\Entities\Message;
use Al3x5\xBot\Telegram\Entities\MessageId;
use Al3x5\xBot\Telegram\Entities\WebhookInfo;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\UserProfilePhotos;
use Al3x5\xBot\Telegram\Entities\File;
use Al3x5\xBot\Telegram\Entities\ChatInviteLink;
use Al3x5\xBot\Telegram\Entities\ChatFullInfo;
use Al3x5\xBot\Telegram\Entities\ChatMember;
use Al3x5\xBot\Telegram\Entities\ForumTopic;
use Al3x5\xBot\Telegram\Entities\UserChatBoosts;
use Al3x5\xBot\Telegram\Entities\BusinessConnection;
use Al3x5\xBot\Telegram\Entities\BotName;
use Al3x5\xBot\Telegram\Entities\BotDescription;
use Al3x5\xBot\Telegram\Entities\BotShortDescription;
use Al3x5\xBot\Telegram\Entities\StarAmount;
use Al3x5\xBot\Telegram\Entities\Poll;
use Al3x5\xBot\Telegram\Entities\StickerSet;
use Al3x5\xBot\Telegram\Entities\PreparedInlineMessage;
use Al3x5\xBot\Telegram\Entities\UserProfileAudios;
use Al3x5\xBot\Telegram\Entities\SentWebAppMessage;
use Al3x5\xBot\Telegram\Entities\StarTransactions;

trait Methods
{
    public function sender(string $method, array $args=[]): mixed
    {
        $api = new ApiClient($method, $args);
        return $api->send();
    }

    /**
     * Use this method to receive incoming updates using long polling (wiki). Returns an Array of Update objects.
     * @param int $offset
     * @param int $limit
     * @param int $timeout
     * @param array $allowed_updates
     * @return Update[]
     */
    public function getUpdates(?int $offset = null, ?int $limit = null, ?int $timeout = null, ?array $allowed_updates = null): array
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to specify a URL and receive incoming updates via an outgoing webhook. Whenever there is an update for the bot, we will send an HTTPS POST request to the specified URL, containing a JSON-serialized Update. In case of an unsuccessful request (a request with response HTTP status code different from 2XY), we will repeat the request and give up after a reasonable amount of attempts. Returns True on success.
     * If you'd like to make sure that the webhook was set by you, you can specify secret data in the parameter secret_token. If specified, the request will contain a header “X-Telegram-Bot-Api-Secret-Token” with the secret token as content.
     * @param string $url
     * @param InputFile $certificate
     * @param string $ip_address
     * @param int $max_connections
     * @param array $allowed_updates
     * @param bool $drop_pending_updates
     * @param string $secret_token
     * @return bool
     */
    public function setWebhook(string $url, ?InputFile $certificate = null, ?string $ip_address = null, ?int $max_connections = null, ?array $allowed_updates = null, ?bool $drop_pending_updates = null, ?string $secret_token = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to remove webhook integration if you decide to switch back to getUpdates. Returns True on success.
     * @param bool $drop_pending_updates
     * @return bool
     */
    public function deleteWebhook(?bool $drop_pending_updates = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get current webhook status. Requires no parameters. On success, returns a WebhookInfo object. If the bot is using getUpdates, will return an object with the url field empty.
     * @return WebhookInfo
     */
    public function getWebhookInfo(): WebhookInfo
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * A simple method for testing your bot's authentication token. Requires no parameters. Returns basic information about the bot in form of a User object.
     * @return User
     */
    public function getMe(): User
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to log out from the cloud Bot API server before launching the bot locally. You must log out the bot before running it locally, otherwise there is no guarantee that the bot will receive updates. After a successful call, you can immediately log in on a local server, but will not be able to log in back to the cloud Bot API server for 10 minutes. Returns True on success. Requires no parameters.
     * @return bool
     */
    public function logOut(): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to close the bot instance before moving it from one local server to another. You need to delete the webhook before calling this method to ensure that the bot isn't launched again after server restart. The method will return error 429 in the first 10 minutes after the bot is launched. Returns True on success. Requires no parameters.
     * @return bool
     */
    public function close(): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send text messages. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param string $text
     * @param string $parse_mode
     * @param MessageEntity[] $entities
     * @param LinkPreviewOptions $link_preview_options
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendMessage(int|string $chat_id, string $text, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?string $parse_mode = null, ?array $entities = null, ?LinkPreviewOptions $link_preview_options = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to forward messages of any kind. Service messages and messages with protected content can't be forwarded. On success, the sent Message is returned.
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param int|string $from_chat_id
     * @param int $video_start_timestamp
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param int $message_id
     * @return Message
     */
    public function forwardMessage(int|string $chat_id, int|string $from_chat_id, int $message_id, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?int $video_start_timestamp = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to forward multiple messages of any kind. If some of the specified messages can't be found or forwarded, they are skipped. Service messages and messages with protected content can't be forwarded. Album grouping is kept for forwarded messages. On success, an array of MessageId of the sent messages is returned.
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param int|string $from_chat_id
     * @param array $message_ids
     * @param bool $disable_notification
     * @param bool $protect_content
     * @return MessageId[]
     */
    public function forwardMessages(int|string $chat_id, int|string $from_chat_id, array $message_ids, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?bool $disable_notification = null, ?bool $protect_content = null): array
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to copy messages of any kind. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessage, but the copied message doesn't have a link to the original message. Returns the MessageId of the sent message on success.
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param int|string $from_chat_id
     * @param int $message_id
     * @param int $video_start_timestamp
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param bool $show_caption_above_media
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return MessageId
     */
    public function copyMessage(int|string $chat_id, int|string $from_chat_id, int $message_id, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?int $video_start_timestamp = null, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?bool $show_caption_above_media = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): MessageId
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to copy messages of any kind. If some of the specified messages can't be found or copied, they are skipped. Service messages, paid media messages, giveaway messages, giveaway winners messages, and invoice messages can't be copied. A quiz poll can be copied only if the value of the field correct_option_id is known to the bot. The method is analogous to the method forwardMessages, but the copied messages don't have a link to the original message. Album grouping is kept for copied messages. On success, an array of MessageId of the sent messages is returned.
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param int|string $from_chat_id
     * @param array $message_ids
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $remove_caption
     * @return MessageId[]
     */
    public function copyMessages(int|string $chat_id, int|string $from_chat_id, array $message_ids, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $remove_caption = null): array
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send photos. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param InputFile|string $photo
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param bool $show_caption_above_media
     * @param bool $has_spoiler
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendPhoto(int|string $chat_id, InputFile|string $photo, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?bool $show_caption_above_media = null, ?bool $has_spoiler = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display them in the music player. Your audio must be in the .MP3 or .M4A format. On success, the sent Message is returned. Bots can currently send audio files of up to 50 MB in size, this limit may be changed in the future.
     * For sending voice messages, use the sendVoice method instead.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param InputFile|string $audio
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param int $duration
     * @param string $performer
     * @param string $title
     * @param InputFile|string $thumbnail
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendAudio(int|string $chat_id, InputFile|string $audio, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?int $duration = null, ?string $performer = null, ?string $title = null, InputFile|string|null $thumbnail = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send general files. On success, the sent Message is returned. Bots can currently send files of any type of up to 50 MB in size, this limit may be changed in the future.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param InputFile|string $document
     * @param InputFile|string $thumbnail
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param bool $disable_content_type_detection
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendDocument(int|string $chat_id, InputFile|string $document, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, InputFile|string|null $thumbnail = null, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?bool $disable_content_type_detection = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send video files, Telegram clients support MPEG4 videos (other formats may be sent as Document). On success, the sent Message is returned. Bots can currently send video files of up to 50 MB in size, this limit may be changed in the future.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param InputFile|string $video
     * @param int $duration
     * @param int $width
     * @param int $height
     * @param InputFile|string $thumbnail
     * @param InputFile|string $cover
     * @param int $start_timestamp
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param bool $show_caption_above_media
     * @param bool $has_spoiler
     * @param bool $supports_streaming
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendVideo(int|string $chat_id, InputFile|string $video, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?int $duration = null, ?int $width = null, ?int $height = null, InputFile|string|null $thumbnail = null, InputFile|string|null $cover = null, ?int $start_timestamp = null, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?bool $show_caption_above_media = null, ?bool $has_spoiler = null, ?bool $supports_streaming = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send animation files (GIF or H.264/MPEG-4 AVC video without sound). On success, the sent Message is returned. Bots can currently send animation files of up to 50 MB in size, this limit may be changed in the future.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param InputFile|string $animation
     * @param int $duration
     * @param int $width
     * @param int $height
     * @param InputFile|string $thumbnail
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param bool $show_caption_above_media
     * @param bool $has_spoiler
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendAnimation(int|string $chat_id, InputFile|string $animation, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?int $duration = null, ?int $width = null, ?int $height = null, InputFile|string|null $thumbnail = null, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?bool $show_caption_above_media = null, ?bool $has_spoiler = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send audio files, if you want Telegram clients to display the file as a playable voice message. For this to work, your audio must be in an .OGG file encoded with OPUS, or in .MP3 format, or in .M4A format (other formats may be sent as Audio or Document). On success, the sent Message is returned. Bots can currently send voice messages of up to 50 MB in size, this limit may be changed in the future.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param InputFile|string $voice
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param int $duration
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendVoice(int|string $chat_id, InputFile|string $voice, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?int $duration = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * As of v.4.0, Telegram clients support rounded square MPEG4 videos of up to 1 minute long. Use this method to send video messages. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param InputFile|string $video_note
     * @param int $duration
     * @param int $length
     * @param InputFile|string $thumbnail
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendVideoNote(int|string $chat_id, InputFile|string $video_note, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?int $duration = null, ?int $length = null, InputFile|string|null $thumbnail = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send paid media. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param int $star_count
     * @param InputPaidMedia[] $media
     * @param string $payload
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param bool $show_caption_above_media
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendPaidMedia(int|string $chat_id, int $star_count, array $media, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?string $payload = null, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?bool $show_caption_above_media = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send a group of photos, videos, documents or audios as an album. Documents and audio files can be only grouped in an album with messages of the same type. On success, an array of Message objects that were sent is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param InputMediaAudio[]|InputMediaDocument[]|InputMediaPhoto[]|InputMediaVideo[] $media
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param ReplyParameters $reply_parameters
     * @return Message[]
     */
    public function sendMediaGroup(int|string $chat_id, array $media, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?ReplyParameters $reply_parameters = null): array
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send point on the map. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param float $latitude
     * @param float $longitude
     * @param float $horizontal_accuracy
     * @param int $live_period
     * @param int $heading
     * @param int $proximity_alert_radius
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendLocation(int|string $chat_id, float $latitude, float $longitude, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?float $horizontal_accuracy = null, ?int $live_period = null, ?int $heading = null, ?int $proximity_alert_radius = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send information about a venue. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param string $address
     * @param string $foursquare_id
     * @param string $foursquare_type
     * @param string $google_place_id
     * @param string $google_place_type
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendVenue(int|string $chat_id, float $latitude, float $longitude, string $title, string $address, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?string $foursquare_id = null, ?string $foursquare_type = null, ?string $google_place_id = null, ?string $google_place_type = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send phone contacts. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param string $phone_number
     * @param string $first_name
     * @param string $last_name
     * @param string $vcard
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendContact(int|string $chat_id, string $phone_number, string $first_name, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?string $last_name = null, ?string $vcard = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send a native poll. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param string $question
     * @param string $question_parse_mode
     * @param MessageEntity[] $question_entities
     * @param InputPollOption[] $options
     * @param bool $is_anonymous
     * @param string $type
     * @param bool $allows_multiple_answers
     * @param int $correct_option_id
     * @param string $explanation
     * @param string $explanation_parse_mode
     * @param MessageEntity[] $explanation_entities
     * @param int $open_period
     * @param int $close_date
     * @param bool $is_closed
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendPoll(int|string $chat_id, string $question, array $options, ?string $business_connection_id = null, ?int $message_thread_id = null, ?string $question_parse_mode = null, ?array $question_entities = null, ?bool $is_anonymous = null, ?string $type = null, ?bool $allows_multiple_answers = null, ?int $correct_option_id = null, ?string $explanation = null, ?string $explanation_parse_mode = null, ?array $explanation_entities = null, ?int $open_period = null, ?int $close_date = null, ?bool $is_closed = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send a checklist on behalf of a connected business account. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int $chat_id
     * @param InputChecklist $checklist
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param string $message_effect_id
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup $reply_markup
     * @return Message
     */
    public function sendChecklist(string $business_connection_id, int $chat_id, InputChecklist $checklist, ?bool $disable_notification = null, ?bool $protect_content = null, ?string $message_effect_id = null, ?ReplyParameters $reply_parameters = null, ?InlineKeyboardMarkup $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send an animated emoji that will display a random value. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param string $emoji
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendDice(int|string $chat_id, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?string $emoji = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to stream a partial message to a user while the message is being generated. Returns True on success.
     * @param int $chat_id
     * @param int $message_thread_id
     * @param int $draft_id
     * @param string $text
     * @param string $parse_mode
     * @param MessageEntity[] $entities
     * @return bool
     */
    public function sendMessageDraft(int $chat_id, int $draft_id, string $text, ?int $message_thread_id = null, ?string $parse_mode = null, ?array $entities = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method when you need to tell the user that something is happening on the bot's side. The status is set for 5 seconds or less (when a message arrives from your bot, Telegram clients clear its typing status). Returns True on success.
     * We only recommend using this method when a response from the bot will take a noticeable amount of time to arrive.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param string $action
     * @return bool
     */
    public function sendChatAction(int|string $chat_id, string $action, ?string $business_connection_id = null, ?int $message_thread_id = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the chosen reactions on a message. Service messages of some types can't be reacted to. Automatically forwarded messages from a channel to its discussion group have the same available reactions as messages in the channel. Bots can't use paid reactions. Returns True on success.
     * @param int|string $chat_id
     * @param int $message_id
     * @param ReactionType[] $reaction
     * @param bool $is_big
     * @return bool
     */
    public function setMessageReaction(int|string $chat_id, int $message_id, ?array $reaction = null, ?bool $is_big = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get a list of profile pictures for a user. Returns a UserProfilePhotos object.
     * @param int $user_id
     * @param int $offset
     * @param int $limit
     * @return UserProfilePhotos
     */
    public function getUserProfilePhotos(int $user_id, ?int $offset = null, ?int $limit = null): UserProfilePhotos
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get a list of profile audios for a user. Returns a UserProfileAudios object.
     * @param int $user_id
     * @param int $offset
     * @param int $limit
     * @return UserProfileAudios
     */
    public function getUserProfileAudios(int $user_id, ?int $offset = null, ?int $limit = null): UserProfileAudios
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Changes the emoji status for a given user that previously allowed the bot to manage their emoji status via the Mini App method requestEmojiStatusAccess. Returns True on success.
     * @param int $user_id
     * @param string $emoji_status_custom_emoji_id
     * @param int $emoji_status_expiration_date
     * @return bool
     */
    public function setUserEmojiStatus(int $user_id, ?string $emoji_status_custom_emoji_id = null, ?int $emoji_status_expiration_date = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get basic information about a file and prepare it for downloading. For the moment, bots can download files of up to 20MB in size. On success, a File object is returned. The file can then be downloaded via the link https://api.telegram.org/file/bot<token>/<file_path>, where <file_path> is taken from the response. It is guaranteed that the link will be valid for at least 1 hour. When the link expires, a new one can be requested by calling getFile again.
     * Note: This function may not preserve the original file name and MIME type. You should save the file's MIME type and name (if available) when the File object is received.
     * @param string $file_id
     * @return File
     */
    public function getFile(string $file_id): File
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to ban a user in a group, a supergroup or a channel. In the case of supergroups and channels, the user will not be able to return to the chat on their own using invite links, etc., unless unbanned first. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @param int $user_id
     * @param int $until_date
     * @param bool $revoke_messages
     * @return bool
     */
    public function banChatMember(int|string $chat_id, int $user_id, ?int $until_date = null, ?bool $revoke_messages = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to unban a previously banned user in a supergroup or channel. The user will not return to the group or channel automatically, but will be able to join via link, etc. The bot must be an administrator for this to work. By default, this method guarantees that after the call the user is not a member of the chat, but will be able to join it. So if the user is a member of the chat they will also be removed from the chat. If you don't want this, use the parameter only_if_banned. Returns True on success.
     * @param int|string $chat_id
     * @param int $user_id
     * @param bool $only_if_banned
     * @return bool
     */
    public function unbanChatMember(int|string $chat_id, int $user_id, ?bool $only_if_banned = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to restrict a user in a supergroup. The bot must be an administrator in the supergroup for this to work and must have the appropriate administrator rights. Pass True for all permissions to lift restrictions from a user. Returns True on success.
     * @param int|string $chat_id
     * @param int $user_id
     * @param ChatPermissions $permissions
     * @param bool $use_independent_chat_permissions
     * @param int $until_date
     * @return bool
     */
    public function restrictChatMember(int|string $chat_id, int $user_id, ChatPermissions $permissions, ?bool $use_independent_chat_permissions = null, ?int $until_date = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to promote or demote a user in a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Pass False for all boolean parameters to demote a user. Returns True on success.
     * @param int|string $chat_id
     * @param int $user_id
     * @param bool $is_anonymous
     * @param bool $can_manage_chat
     * @param bool $can_delete_messages
     * @param bool $can_manage_video_chats
     * @param bool $can_restrict_members
     * @param bool $can_promote_members
     * @param bool $can_change_info
     * @param bool $can_invite_users
     * @param bool $can_post_stories
     * @param bool $can_edit_stories
     * @param bool $can_delete_stories
     * @param bool $can_post_messages
     * @param bool $can_edit_messages
     * @param bool $can_pin_messages
     * @param bool $can_manage_topics
     * @param bool $can_manage_direct_messages
     * @param bool $can_manage_tags
     * @return bool
     */
    public function promoteChatMember(int|string $chat_id, int $user_id, ?bool $is_anonymous = null, ?bool $can_manage_chat = null, ?bool $can_delete_messages = null, ?bool $can_manage_video_chats = null, ?bool $can_restrict_members = null, ?bool $can_promote_members = null, ?bool $can_change_info = null, ?bool $can_invite_users = null, ?bool $can_post_stories = null, ?bool $can_edit_stories = null, ?bool $can_delete_stories = null, ?bool $can_post_messages = null, ?bool $can_edit_messages = null, ?bool $can_pin_messages = null, ?bool $can_manage_topics = null, ?bool $can_manage_direct_messages = null, ?bool $can_manage_tags = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to set a custom title for an administrator in a supergroup promoted by the bot. Returns True on success.
     * @param int|string $chat_id
     * @param int $user_id
     * @param string $custom_title
     * @return bool
     */
    public function setChatAdministratorCustomTitle(int|string $chat_id, int $user_id, string $custom_title): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to set a tag for a regular member in a group or a supergroup. The bot must be an administrator in the chat for this to work and must have the can_manage_tags administrator right. Returns True on success.
     * @param int|string $chat_id
     * @param int $user_id
     * @param string $tag
     * @return bool
     */
    public function setChatMemberTag(int|string $chat_id, int $user_id, ?string $tag = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to ban a channel chat in a supergroup or a channel. Until the chat is unbanned, the owner of the banned chat won't be able to send messages on behalf of any of their channels. The bot must be an administrator in the supergroup or channel for this to work and must have the appropriate administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @param int $sender_chat_id
     * @return bool
     */
    public function banChatSenderChat(int|string $chat_id, int $sender_chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to unban a previously banned channel chat in a supergroup or channel. The bot must be an administrator for this to work and must have the appropriate administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @param int $sender_chat_id
     * @return bool
     */
    public function unbanChatSenderChat(int|string $chat_id, int $sender_chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to set default chat permissions for all members. The bot must be an administrator in the group or a supergroup for this to work and must have the can_restrict_members administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @param ChatPermissions $permissions
     * @param bool $use_independent_chat_permissions
     * @return bool
     */
    public function setChatPermissions(int|string $chat_id, ChatPermissions $permissions, ?bool $use_independent_chat_permissions = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to generate a new primary invite link for a chat; any previously generated primary link is revoked. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the new invite link as String on success.
     * @param int|string $chat_id
     * @return string
     */
    public function exportChatInviteLink(int|string $chat_id): string
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to create an additional invite link for a chat. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. The link can be revoked using the method revokeChatInviteLink. Returns the new invite link as ChatInviteLink object.
     * @param int|string $chat_id
     * @param string $name
     * @param int $expire_date
     * @param int $member_limit
     * @param bool $creates_join_request
     * @return ChatInviteLink
     */
    public function createChatInviteLink(int|string $chat_id, ?string $name = null, ?int $expire_date = null, ?int $member_limit = null, ?bool $creates_join_request = null): ChatInviteLink
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to edit a non-primary invite link created by the bot. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the edited invite link as a ChatInviteLink object.
     * @param int|string $chat_id
     * @param string $invite_link
     * @param string $name
     * @param int $expire_date
     * @param int $member_limit
     * @param bool $creates_join_request
     * @return ChatInviteLink
     */
    public function editChatInviteLink(int|string $chat_id, string $invite_link, ?string $name = null, ?int $expire_date = null, ?int $member_limit = null, ?bool $creates_join_request = null): ChatInviteLink
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to create a subscription invite link for a channel chat. The bot must have the can_invite_users administrator rights. The link can be edited using the method editChatSubscriptionInviteLink or revoked using the method revokeChatInviteLink. Returns the new invite link as a ChatInviteLink object.
     * @param int|string $chat_id
     * @param string $name
     * @param int $subscription_period
     * @param int $subscription_price
     * @return ChatInviteLink
     */
    public function createChatSubscriptionInviteLink(int|string $chat_id, int $subscription_period, int $subscription_price, ?string $name = null): ChatInviteLink
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to edit a subscription invite link created by the bot. The bot must have the can_invite_users administrator rights. Returns the edited invite link as a ChatInviteLink object.
     * @param int|string $chat_id
     * @param string $invite_link
     * @param string $name
     * @return ChatInviteLink
     */
    public function editChatSubscriptionInviteLink(int|string $chat_id, string $invite_link, ?string $name = null): ChatInviteLink
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to revoke an invite link created by the bot. If the primary link is revoked, a new link is automatically generated. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns the revoked invite link as ChatInviteLink object.
     * @param int|string $chat_id
     * @param string $invite_link
     * @return ChatInviteLink
     */
    public function revokeChatInviteLink(int|string $chat_id, string $invite_link): ChatInviteLink
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to approve a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
     * @param int|string $chat_id
     * @param int $user_id
     * @return bool
     */
    public function approveChatJoinRequest(int|string $chat_id, int $user_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to decline a chat join request. The bot must be an administrator in the chat for this to work and must have the can_invite_users administrator right. Returns True on success.
     * @param int|string $chat_id
     * @param int $user_id
     * @return bool
     */
    public function declineChatJoinRequest(int|string $chat_id, int $user_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to set a new profile photo for the chat. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @param InputFile $photo
     * @return bool
     */
    public function setChatPhoto(int|string $chat_id, InputFile $photo): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to delete a chat photo. Photos can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @return bool
     */
    public function deleteChatPhoto(int|string $chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the title of a chat. Titles can't be changed for private chats. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @param string $title
     * @return bool
     */
    public function setChatTitle(int|string $chat_id, string $title): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the description of a group, a supergroup or a channel. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @param string $description
     * @return bool
     */
    public function setChatDescription(int|string $chat_id, ?string $description = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to add a message to the list of pinned messages in a chat. In private chats and channel direct messages chats, all non-service messages can be pinned. Conversely, the bot must be an administrator with the 'can_pin_messages' right or the 'can_edit_messages' right to pin messages in groups and channels respectively. Returns True on success.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_id
     * @param bool $disable_notification
     * @return bool
     */
    public function pinChatMessage(int|string $chat_id, int $message_id, ?string $business_connection_id = null, ?bool $disable_notification = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to remove a message from the list of pinned messages in a chat. In private chats and channel direct messages chats, all messages can be unpinned. Conversely, the bot must be an administrator with the 'can_pin_messages' right or the 'can_edit_messages' right to unpin messages in groups and channels respectively. Returns True on success.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_id
     * @return bool
     */
    public function unpinChatMessage(int|string $chat_id, ?string $business_connection_id = null, ?int $message_id = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to clear the list of pinned messages in a chat. In private chats and channel direct messages chats, no additional rights are required to unpin all pinned messages. Conversely, the bot must be an administrator with the 'can_pin_messages' right or the 'can_edit_messages' right to unpin all pinned messages in groups and channels respectively. Returns True on success.
     * @param int|string $chat_id
     * @return bool
     */
    public function unpinAllChatMessages(int|string $chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method for your bot to leave a group, supergroup or channel. Returns True on success.
     * @param int|string $chat_id
     * @return bool
     */
    public function leaveChat(int|string $chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get up-to-date information about the chat. Returns a ChatFullInfo object on success.
     * @param int|string $chat_id
     * @return ChatFullInfo
     */
    public function getChat(int|string $chat_id): ChatFullInfo
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get a list of administrators in a chat, which aren't bots. Returns an Array of ChatMember objects.
     * @param int|string $chat_id
     * @return ChatMember[]
     */
    public function getChatAdministrators(int|string $chat_id): array
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get the number of members in a chat. Returns Int on success.
     * @param int|string $chat_id
     * @return int
     */
    public function getChatMemberCount(int|string $chat_id): int
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get information about a member of a chat. The method is only guaranteed to work for other users if the bot is an administrator in the chat. Returns a ChatMember object on success.
     * @param int|string $chat_id
     * @param int $user_id
     * @return ChatMember
     */
    public function getChatMember(int|string $chat_id, int $user_id): ChatMember
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to set a new group sticker set for a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
     * @param int|string $chat_id
     * @param string $sticker_set_name
     * @return bool
     */
    public function setChatStickerSet(int|string $chat_id, string $sticker_set_name): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to delete a group sticker set from a supergroup. The bot must be an administrator in the chat for this to work and must have the appropriate administrator rights. Use the field can_set_sticker_set optionally returned in getChat requests to check if the bot can use this method. Returns True on success.
     * @param int|string $chat_id
     * @return bool
     */
    public function deleteChatStickerSet(int|string $chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get custom emoji stickers, which can be used as a forum topic icon by any user. Requires no parameters. Returns an Array of Sticker objects.
     * @return Sticker[]
     */
    public function getForumTopicIconStickers(): array
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to create a topic in a forum supergroup chat or a private chat with a user. In the case of a supergroup chat the bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator right. Returns information about the created topic as a ForumTopic object.
     * @param int|string $chat_id
     * @param string $name
     * @param int $icon_color
     * @param string $icon_custom_emoji_id
     * @return ForumTopic
     */
    public function createForumTopic(int|string $chat_id, string $name, ?int $icon_color = null, ?string $icon_custom_emoji_id = null): ForumTopic
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to edit name and icon of a topic in a forum supergroup chat or a private chat with a user. In the case of a supergroup chat the bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param string $name
     * @param string $icon_custom_emoji_id
     * @return bool
     */
    public function editForumTopic(int|string $chat_id, int $message_thread_id, ?string $name = null, ?string $icon_custom_emoji_id = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to close an open topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @return bool
     */
    public function closeForumTopic(int|string $chat_id, int $message_thread_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to reopen a closed topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights, unless it is the creator of the topic. Returns True on success.
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @return bool
     */
    public function reopenForumTopic(int|string $chat_id, int $message_thread_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to delete a forum topic along with all its messages in a forum supergroup chat or a private chat with a user. In the case of a supergroup chat the bot must be an administrator in the chat for this to work and must have the can_delete_messages administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @return bool
     */
    public function deleteForumTopic(int|string $chat_id, int $message_thread_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to clear the list of pinned messages in a forum topic in a forum supergroup chat or a private chat with a user. In the case of a supergroup chat the bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @return bool
     */
    public function unpinAllForumTopicMessages(int|string $chat_id, int $message_thread_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to edit the name of the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @param string $name
     * @return bool
     */
    public function editGeneralForumTopic(int|string $chat_id, string $name): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to close an open 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @return bool
     */
    public function closeGeneralForumTopic(int|string $chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to reopen a closed 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically unhidden if it was hidden. Returns True on success.
     * @param int|string $chat_id
     * @return bool
     */
    public function reopenGeneralForumTopic(int|string $chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to hide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. The topic will be automatically closed if it was open. Returns True on success.
     * @param int|string $chat_id
     * @return bool
     */
    public function hideGeneralForumTopic(int|string $chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to unhide the 'General' topic in a forum supergroup chat. The bot must be an administrator in the chat for this to work and must have the can_manage_topics administrator rights. Returns True on success.
     * @param int|string $chat_id
     * @return bool
     */
    public function unhideGeneralForumTopic(int|string $chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to clear the list of pinned messages in a General forum topic. The bot must be an administrator in the chat for this to work and must have the can_pin_messages administrator right in the supergroup. Returns True on success.
     * @param int|string $chat_id
     * @return bool
     */
    public function unpinAllGeneralForumTopicMessages(int|string $chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send answers to callback queries sent from inline keyboards. The answer will be displayed to the user as a notification at the top of the chat screen or as an alert. On success, True is returned.
     * @param string $callback_query_id
     * @param string $text
     * @param bool $show_alert
     * @param string $url
     * @param int $cache_time
     * @return bool
     */
    public function answerCallbackQuery(string $callback_query_id, ?string $text = null, ?bool $show_alert = null, ?string $url = null, ?int $cache_time = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get the list of boosts added to a chat by a user. Requires administrator rights in the chat. Returns a UserChatBoosts object.
     * @param int|string $chat_id
     * @param int $user_id
     * @return UserChatBoosts
     */
    public function getUserChatBoosts(int|string $chat_id, int $user_id): UserChatBoosts
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get information about the connection of the bot with a business account. Returns a BusinessConnection object on success.
     * @param string $business_connection_id
     * @return BusinessConnection
     */
    public function getBusinessConnection(string $business_connection_id): BusinessConnection
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the list of the bot's commands. See this manual for more details about bot commands. Returns True on success.
     * @param BotCommand[] $commands
     * @param BotCommandScope $scope
     * @param string $language_code
     * @return bool
     */
    public function setMyCommands(array $commands, ?BotCommandScope $scope = null, ?string $language_code = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to delete the list of the bot's commands for the given scope and user language. After deletion, higher level commands will be shown to affected users. Returns True on success.
     * @param BotCommandScope $scope
     * @param string $language_code
     * @return bool
     */
    public function deleteMyCommands(?BotCommandScope $scope = null, ?string $language_code = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get the current list of the bot's commands for the given scope and user language. Returns an Array of BotCommand objects. If commands aren't set, an empty list is returned.
     * @param BotCommandScope $scope
     * @param string $language_code
     * @return BotCommand[]
     */
    public function getMyCommands(?BotCommandScope $scope = null, ?string $language_code = null): array
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the bot's name. Returns True on success.
     * @param string $name
     * @param string $language_code
     * @return bool
     */
    public function setMyName(?string $name = null, ?string $language_code = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get the current bot name for the given user language. Returns BotName on success.
     * @param string $language_code
     * @return BotName
     */
    public function getMyName(?string $language_code = null): BotName
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the bot's description, which is shown in the chat with the bot if the chat is empty. Returns True on success.
     * @param string $description
     * @param string $language_code
     * @return bool
     */
    public function setMyDescription(?string $description = null, ?string $language_code = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get the current bot description for the given user language. Returns BotDescription on success.
     * @param string $language_code
     * @return BotDescription
     */
    public function getMyDescription(?string $language_code = null): BotDescription
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the bot's short description, which is shown on the bot's profile page and is sent together with the link when users share the bot. Returns True on success.
     * @param string $short_description
     * @param string $language_code
     * @return bool
     */
    public function setMyShortDescription(?string $short_description = null, ?string $language_code = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get the current bot short description for the given user language. Returns BotShortDescription on success.
     * @param string $language_code
     * @return BotShortDescription
     */
    public function getMyShortDescription(?string $language_code = null): BotShortDescription
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Changes the profile photo of the bot. Returns True on success.
     * @param InputProfilePhoto $photo
     * @return bool
     */
    public function setMyProfilePhoto(InputProfilePhoto $photo): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Removes the profile photo of the bot. Requires no parameters. Returns True on success.
     * @return bool
     */
    public function removeMyProfilePhoto(): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the bot's menu button in a private chat, or the default menu button. Returns True on success.
     * @param int $chat_id
     * @param MenuButton $menu_button
     * @return bool
     */
    public function setChatMenuButton(?int $chat_id = null, ?MenuButton $menu_button = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get the current value of the bot's menu button in a private chat, or the default menu button. Returns MenuButton on success.
     * @param int $chat_id
     * @return MenuButton
     */
    public function getChatMenuButton(?int $chat_id = null): MenuButton
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the default administrator rights requested by the bot when it's added as an administrator to groups or channels. These rights will be suggested to users, but they are free to modify the list before adding the bot. Returns True on success.
     * @param ChatAdministratorRights $rights
     * @param bool $for_channels
     * @return bool
     */
    public function setMyDefaultAdministratorRights(?ChatAdministratorRights $rights = null, ?bool $for_channels = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get the current default administrator rights of the bot. Returns ChatAdministratorRights on success.
     * @param bool $for_channels
     * @return ChatAdministratorRights
     */
    public function getMyDefaultAdministratorRights(?bool $for_channels = null): ChatAdministratorRights
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Returns the list of gifts that can be sent by the bot to users and channel chats. Requires no parameters. Returns a Gifts object.
     * @return 
     */
    public function getAvailableGifts(): mixed
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Sends a gift to the given user or channel chat. The gift can't be converted to Telegram Stars by the receiver. Returns True on success.
     * @param int $user_id
     * @param int|string $chat_id
     * @param string $gift_id
     * @param bool $pay_for_upgrade
     * @param string $text
     * @param string $text_parse_mode
     * @param MessageEntity[] $text_entities
     * @return bool
     */
    public function sendGift(string $gift_id, ?int $user_id = null, int|string|null $chat_id = null, ?bool $pay_for_upgrade = null, ?string $text = null, ?string $text_parse_mode = null, ?array $text_entities = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Gifts a Telegram Premium subscription to the given user. Returns True on success.
     * @param int $user_id
     * @param int $month_count
     * @param int $star_count
     * @param string $text
     * @param string $text_parse_mode
     * @param MessageEntity[] $text_entities
     * @return bool
     */
    public function giftPremiumSubscription(int $user_id, int $month_count, int $star_count, ?string $text = null, ?string $text_parse_mode = null, ?array $text_entities = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Verifies a user on behalf of the organization which is represented by the bot. Returns True on success.
     * @param int $user_id
     * @param string $custom_description
     * @return bool
     */
    public function verifyUser(int $user_id, ?string $custom_description = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Verifies a chat on behalf of the organization which is represented by the bot. Returns True on success.
     * @param int|string $chat_id
     * @param string $custom_description
     * @return bool
     */
    public function verifyChat(int|string $chat_id, ?string $custom_description = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Removes verification from a user who is currently verified on behalf of the organization represented by the bot. Returns True on success.
     * @param int $user_id
     * @return bool
     */
    public function removeUserVerification(int $user_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Removes verification from a chat that is currently verified on behalf of the organization represented by the bot. Returns True on success.
     * @param int|string $chat_id
     * @return bool
     */
    public function removeChatVerification(int|string $chat_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Marks incoming message as read on behalf of a business account. Requires the can_read_messages business bot right. Returns True on success.
     * @param string $business_connection_id
     * @param int $chat_id
     * @param int $message_id
     * @return bool
     */
    public function readBusinessMessage(string $business_connection_id, int $chat_id, int $message_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Delete messages on behalf of a business account. Requires the can_delete_sent_messages business bot right to delete messages sent by the bot itself, or the can_delete_all_messages business bot right to delete any message. Returns True on success.
     * @param string $business_connection_id
     * @param array $message_ids
     * @return bool
     */
    public function deleteBusinessMessages(string $business_connection_id, array $message_ids): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Changes the first and last name of a managed business account. Requires the can_change_name business bot right. Returns True on success.
     * @param string $business_connection_id
     * @param string $first_name
     * @param string $last_name
     * @return bool
     */
    public function setBusinessAccountName(string $business_connection_id, string $first_name, ?string $last_name = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Changes the username of a managed business account. Requires the can_change_username business bot right. Returns True on success.
     * @param string $business_connection_id
     * @param string $username
     * @return bool
     */
    public function setBusinessAccountUsername(string $business_connection_id, ?string $username = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Changes the bio of a managed business account. Requires the can_change_bio business bot right. Returns True on success.
     * @param string $business_connection_id
     * @param string $bio
     * @return bool
     */
    public function setBusinessAccountBio(string $business_connection_id, ?string $bio = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Changes the profile photo of a managed business account. Requires the can_edit_profile_photo business bot right. Returns True on success.
     * @param string $business_connection_id
     * @param InputProfilePhoto $photo
     * @param bool $is_public
     * @return bool
     */
    public function setBusinessAccountProfilePhoto(string $business_connection_id, InputProfilePhoto $photo, ?bool $is_public = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Removes the current profile photo of a managed business account. Requires the can_edit_profile_photo business bot right. Returns True on success.
     * @param string $business_connection_id
     * @param bool $is_public
     * @return bool
     */
    public function removeBusinessAccountProfilePhoto(string $business_connection_id, ?bool $is_public = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Changes the privacy settings pertaining to incoming gifts in a managed business account. Requires the can_change_gift_settings business bot right. Returns True on success.
     * @param string $business_connection_id
     * @param bool $show_gift_button
     * @param AcceptedGiftTypes $accepted_gift_types
     * @return bool
     */
    public function setBusinessAccountGiftSettings(string $business_connection_id, bool $show_gift_button, AcceptedGiftTypes $accepted_gift_types): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Returns the amount of Telegram Stars owned by a managed business account. Requires the can_view_gifts_and_stars business bot right. Returns StarAmount on success.
     * @param string $business_connection_id
     * @return StarAmount
     */
    public function getBusinessAccountStarBalance(string $business_connection_id): StarAmount
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Transfers Telegram Stars from the business account balance to the bot's balance. Requires the can_transfer_stars business bot right. Returns True on success.
     * @param string $business_connection_id
     * @param int $star_count
     * @return bool
     */
    public function transferBusinessAccountStars(string $business_connection_id, int $star_count): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Returns the gifts received and owned by a managed business account. Requires the can_view_gifts_and_stars business bot right. Returns OwnedGifts on success.
     * @param string $business_connection_id
     * @param bool $exclude_unsaved
     * @param bool $exclude_saved
     * @param bool $exclude_unlimited
     * @param bool $exclude_limited_upgradable
     * @param bool $exclude_limited_non_upgradable
     * @param bool $exclude_unique
     * @param bool $exclude_from_blockchain
     * @param bool $sort_by_price
     * @param string $offset
     * @param int $limit
     * @return 
     */
    public function getBusinessAccountGifts(string $business_connection_id, ?bool $exclude_unsaved = null, ?bool $exclude_saved = null, ?bool $exclude_unlimited = null, ?bool $exclude_limited_upgradable = null, ?bool $exclude_limited_non_upgradable = null, ?bool $exclude_unique = null, ?bool $exclude_from_blockchain = null, ?bool $sort_by_price = null, ?string $offset = null, ?int $limit = null): mixed
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Returns the gifts owned and hosted by a user. Returns OwnedGifts on success.
     * @param int $user_id
     * @param bool $exclude_unlimited
     * @param bool $exclude_limited_upgradable
     * @param bool $exclude_limited_non_upgradable
     * @param bool $exclude_from_blockchain
     * @param bool $exclude_unique
     * @param bool $sort_by_price
     * @param string $offset
     * @param int $limit
     * @return 
     */
    public function getUserGifts(int $user_id, ?bool $exclude_unlimited = null, ?bool $exclude_limited_upgradable = null, ?bool $exclude_limited_non_upgradable = null, ?bool $exclude_from_blockchain = null, ?bool $exclude_unique = null, ?bool $sort_by_price = null, ?string $offset = null, ?int $limit = null): mixed
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Returns the gifts owned by a chat. Returns OwnedGifts on success.
     * @param int|string $chat_id
     * @param bool $exclude_unsaved
     * @param bool $exclude_saved
     * @param bool $exclude_unlimited
     * @param bool $exclude_limited_upgradable
     * @param bool $exclude_limited_non_upgradable
     * @param bool $exclude_from_blockchain
     * @param bool $exclude_unique
     * @param bool $sort_by_price
     * @param string $offset
     * @param int $limit
     * @return 
     */
    public function getChatGifts(int|string $chat_id, ?bool $exclude_unsaved = null, ?bool $exclude_saved = null, ?bool $exclude_unlimited = null, ?bool $exclude_limited_upgradable = null, ?bool $exclude_limited_non_upgradable = null, ?bool $exclude_from_blockchain = null, ?bool $exclude_unique = null, ?bool $sort_by_price = null, ?string $offset = null, ?int $limit = null): mixed
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Converts a given regular gift to Telegram Stars. Requires the can_convert_gifts_to_stars business bot right. Returns True on success.
     * @param string $business_connection_id
     * @param string $owned_gift_id
     * @return bool
     */
    public function convertGiftToStars(string $business_connection_id, string $owned_gift_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Upgrades a given regular gift to a unique gift. Requires the can_transfer_and_upgrade_gifts business bot right. Additionally requires the can_transfer_stars business bot right if the upgrade is paid. Returns True on success.
     * @param string $business_connection_id
     * @param string $owned_gift_id
     * @param bool $keep_original_details
     * @param int $star_count
     * @return bool
     */
    public function upgradeGift(string $business_connection_id, string $owned_gift_id, ?bool $keep_original_details = null, ?int $star_count = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Transfers an owned unique gift to another user. Requires the can_transfer_and_upgrade_gifts business bot right. Requires can_transfer_stars business bot right if the transfer is paid. Returns True on success.
     * @param string $business_connection_id
     * @param string $owned_gift_id
     * @param int $new_owner_chat_id
     * @param int $star_count
     * @return bool
     */
    public function transferGift(string $business_connection_id, string $owned_gift_id, int $new_owner_chat_id, ?int $star_count = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Posts a story on behalf of a managed business account. Requires the can_manage_stories business bot right. Returns Story on success.
     * @param string $business_connection_id
     * @param InputStoryContent $content
     * @param int $active_period
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param StoryArea[] $areas
     * @param bool $post_to_chat_page
     * @param bool $protect_content
     * @return Story
     */
    public function postStory(string $business_connection_id, InputStoryContent $content, int $active_period, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?array $areas = null, ?bool $post_to_chat_page = null, ?bool $protect_content = null): Story
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Reposts a story on behalf of a business account from another business account. Both business accounts must be managed by the same bot, and the story on the source account must have been posted (or reposted) by the bot. Requires the can_manage_stories business bot right for both business accounts. Returns Story on success.
     * @param string $business_connection_id
     * @param int $from_chat_id
     * @param int $from_story_id
     * @param int $active_period
     * @param bool $post_to_chat_page
     * @param bool $protect_content
     * @return Story
     */
    public function repostStory(string $business_connection_id, int $from_chat_id, int $from_story_id, int $active_period, ?bool $post_to_chat_page = null, ?bool $protect_content = null): Story
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Edits a story previously posted by the bot on behalf of a managed business account. Requires the can_manage_stories business bot right. Returns Story on success.
     * @param string $business_connection_id
     * @param int $story_id
     * @param InputStoryContent $content
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param StoryArea[] $areas
     * @return Story
     */
    public function editStory(string $business_connection_id, int $story_id, InputStoryContent $content, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?array $areas = null): Story
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Deletes a story previously posted by the bot on behalf of a managed business account. Requires the can_manage_stories business bot right. Returns True on success.
     * @param string $business_connection_id
     * @param int $story_id
     * @return bool
     */
    public function deleteStory(string $business_connection_id, int $story_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to edit text and game messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_id
     * @param string $inline_message_id
     * @param string $text
     * @param string $parse_mode
     * @param MessageEntity[] $entities
     * @param LinkPreviewOptions $link_preview_options
     * @param InlineKeyboardMarkup $reply_markup
     * @return Message|bool
     */
    public function editMessageText(string $text, ?string $business_connection_id = null, int|string|null $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null, ?string $parse_mode = null, ?array $entities = null, ?LinkPreviewOptions $link_preview_options = null, ?InlineKeyboardMarkup $reply_markup = null): Message|bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to edit captions of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_id
     * @param string $inline_message_id
     * @param string $caption
     * @param string $parse_mode
     * @param MessageEntity[] $caption_entities
     * @param bool $show_caption_above_media
     * @param InlineKeyboardMarkup $reply_markup
     * @return Message|bool
     */
    public function editMessageCaption(?string $business_connection_id = null, int|string|null $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null, ?string $caption = null, ?string $parse_mode = null, ?array $caption_entities = null, ?bool $show_caption_above_media = null, ?InlineKeyboardMarkup $reply_markup = null): Message|bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to edit animation, audio, document, photo, or video messages, or to add media to text messages. If a message is part of a message album, then it can be edited only to an audio for audio albums, only to a document for document albums and to a photo or a video otherwise. When an inline message is edited, a new file can't be uploaded; use a previously uploaded file via its file_id or specify a URL. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_id
     * @param string $inline_message_id
     * @param InputMedia $media
     * @param InlineKeyboardMarkup $reply_markup
     * @return Message|bool
     */
    public function editMessageMedia(InputMedia $media, ?string $business_connection_id = null, int|string|null $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null, ?InlineKeyboardMarkup $reply_markup = null): Message|bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to edit live location messages. A location can be edited until its live_period expires or editing is explicitly disabled by a call to stopMessageLiveLocation. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_id
     * @param string $inline_message_id
     * @param float $latitude
     * @param float $longitude
     * @param int $live_period
     * @param float $horizontal_accuracy
     * @param int $heading
     * @param int $proximity_alert_radius
     * @param InlineKeyboardMarkup $reply_markup
     * @return Message|bool
     */
    public function editMessageLiveLocation(float $latitude, float $longitude, ?string $business_connection_id = null, int|string|null $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null, ?int $live_period = null, ?float $horizontal_accuracy = null, ?int $heading = null, ?int $proximity_alert_radius = null, ?InlineKeyboardMarkup $reply_markup = null): Message|bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to stop updating a live location message before live_period expires. On success, if the message is not an inline message, the edited Message is returned, otherwise True is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_id
     * @param string $inline_message_id
     * @param InlineKeyboardMarkup $reply_markup
     * @return Message|bool
     */
    public function stopMessageLiveLocation(?string $business_connection_id = null, int|string|null $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null, ?InlineKeyboardMarkup $reply_markup = null): Message|bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to edit a checklist on behalf of a connected business account. On success, the edited Message is returned.
     * @param string $business_connection_id
     * @param int $chat_id
     * @param int $message_id
     * @param InputChecklist $checklist
     * @param InlineKeyboardMarkup $reply_markup
     * @return Message
     */
    public function editMessageChecklist(string $business_connection_id, int $chat_id, int $message_id, InputChecklist $checklist, ?InlineKeyboardMarkup $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to edit only the reply markup of messages. On success, if the edited message is not an inline message, the edited Message is returned, otherwise True is returned. Note that business messages that were not sent by the bot and do not contain an inline keyboard can only be edited within 48 hours from the time they were sent.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_id
     * @param string $inline_message_id
     * @param InlineKeyboardMarkup $reply_markup
     * @return Message|bool
     */
    public function editMessageReplyMarkup(?string $business_connection_id = null, int|string|null $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null, ?InlineKeyboardMarkup $reply_markup = null): Message|bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to stop a poll which was sent by the bot. On success, the stopped Poll is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_id
     * @param InlineKeyboardMarkup $reply_markup
     * @return Poll
     */
    public function stopPoll(int|string $chat_id, int $message_id, ?string $business_connection_id = null, ?InlineKeyboardMarkup $reply_markup = null): Poll
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to approve a suggested post in a direct messages chat. The bot must have the 'can_post_messages' administrator right in the corresponding channel chat. Returns True on success.
     * @param int $chat_id
     * @param int $message_id
     * @param int $send_date
     * @return bool
     */
    public function approveSuggestedPost(int $chat_id, int $message_id, ?int $send_date = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to decline a suggested post in a direct messages chat. The bot must have the 'can_manage_direct_messages' administrator right in the corresponding channel chat. Returns True on success.
     * @param int $chat_id
     * @param int $message_id
     * @param string $comment
     * @return bool
     */
    public function declineSuggestedPost(int $chat_id, int $message_id, ?string $comment = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to delete a message, including service messages, with the following limitations:- A message can only be deleted if it was sent less than 48 hours ago.- Service messages about a supergroup, channel, or forum topic creation can't be deleted.- A dice message in a private chat can only be deleted if it was sent more than 24 hours ago.- Bots can delete outgoing messages in private chats, groups, and supergroups.- Bots can delete incoming messages in private chats.- Bots granted can_post_messages permissions can delete outgoing messages in channels.- If the bot is an administrator of a group, it can delete any message there.- If the bot has can_delete_messages administrator right in a supergroup or a channel, it can delete any message there.- If the bot has can_manage_direct_messages administrator right in a channel, it can delete any message in the corresponding direct messages chat.Returns True on success.
     * @param int|string $chat_id
     * @param int $message_id
     * @return bool
     */
    public function deleteMessage(int|string $chat_id, int $message_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to delete multiple messages simultaneously. If some of the specified messages can't be found, they are skipped. Returns True on success.
     * @param int|string $chat_id
     * @param array $message_ids
     * @return bool
     */
    public function deleteMessages(int|string $chat_id, array $message_ids): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send static .WEBP, animated .TGS, or video .WEBM stickers. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param InputFile|string $sticker
     * @param string $emoji
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     * @return Message
     */
    public function sendSticker(int|string $chat_id, InputFile|string $sticker, ?string $business_connection_id = null, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?string $emoji = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get a sticker set. On success, a StickerSet object is returned.
     * @param string $name
     * @return StickerSet
     */
    public function getStickerSet(string $name): StickerSet
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get information about custom emoji stickers by their identifiers. Returns an Array of Sticker objects.
     * @param array $custom_emoji_ids
     * @return Sticker[]
     */
    public function getCustomEmojiStickers(array $custom_emoji_ids): array
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to upload a file with a sticker for later use in the createNewStickerSet, addStickerToSet, or replaceStickerInSet methods (the file can be used multiple times). Returns the uploaded File on success.
     * @param int $user_id
     * @param InputFile $sticker
     * @param string $sticker_format
     * @return File
     */
    public function uploadStickerFile(int $user_id, InputFile $sticker, string $sticker_format): File
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to create a new sticker set owned by a user. The bot will be able to edit the sticker set thus created. Returns True on success.
     * @param int $user_id
     * @param string $name
     * @param string $title
     * @param InputSticker[] $stickers
     * @param string $sticker_type
     * @param bool $needs_repainting
     * @return bool
     */
    public function createNewStickerSet(int $user_id, string $name, string $title, array $stickers, ?string $sticker_type = null, ?bool $needs_repainting = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to add a new sticker to a set created by the bot. Emoji sticker sets can have up to 200 stickers. Other sticker sets can have up to 120 stickers. Returns True on success.
     * @param int $user_id
     * @param string $name
     * @param InputSticker $sticker
     * @return bool
     */
    public function addStickerToSet(int $user_id, string $name, InputSticker $sticker): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to move a sticker in a set created by the bot to a specific position. Returns True on success.
     * @param string $sticker
     * @param int $position
     * @return bool
     */
    public function setStickerPositionInSet(string $sticker, int $position): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to delete a sticker from a set created by the bot. Returns True on success.
     * @param string $sticker
     * @return bool
     */
    public function deleteStickerFromSet(string $sticker): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to replace an existing sticker in a sticker set with a new one. The method is equivalent to calling deleteStickerFromSet, then addStickerToSet, then setStickerPositionInSet. Returns True on success.
     * @param int $user_id
     * @param string $name
     * @param string $old_sticker
     * @param InputSticker $sticker
     * @return bool
     */
    public function replaceStickerInSet(int $user_id, string $name, string $old_sticker, InputSticker $sticker): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the list of emoji assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
     * @param string $sticker
     * @param array $emoji_list
     * @return bool
     */
    public function setStickerEmojiList(string $sticker, array $emoji_list): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change search keywords assigned to a regular or custom emoji sticker. The sticker must belong to a sticker set created by the bot. Returns True on success.
     * @param string $sticker
     * @param array $keywords
     * @return bool
     */
    public function setStickerKeywords(string $sticker, ?array $keywords = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to change the mask position of a mask sticker. The sticker must belong to a sticker set that was created by the bot. Returns True on success.
     * @param string $sticker
     * @param MaskPosition $mask_position
     * @return bool
     */
    public function setStickerMaskPosition(string $sticker, ?MaskPosition $mask_position = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to set the title of a created sticker set. Returns True on success.
     * @param string $name
     * @param string $title
     * @return bool
     */
    public function setStickerSetTitle(string $name, string $title): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to set the thumbnail of a regular or mask sticker set. The format of the thumbnail file must match the format of the stickers in the set. Returns True on success.
     * @param string $name
     * @param int $user_id
     * @param InputFile|string $thumbnail
     * @param string $format
     * @return bool
     */
    public function setStickerSetThumbnail(string $name, int $user_id, string $format, InputFile|string|null $thumbnail = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to set the thumbnail of a custom emoji sticker set. Returns True on success.
     * @param string $name
     * @param string $custom_emoji_id
     * @return bool
     */
    public function setCustomEmojiStickerSetThumbnail(string $name, ?string $custom_emoji_id = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to delete a sticker set that was created by the bot. Returns True on success.
     * @param string $name
     * @return bool
     */
    public function deleteStickerSet(string $name): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send answers to an inline query. On success, True is returned.No more than 50 results per query are allowed.
     * @param string $inline_query_id
     * @param InlineQueryResult[] $results
     * @param int $cache_time
     * @param bool $is_personal
     * @param string $next_offset
     * @param InlineQueryResultsButton $button
     * @return bool
     */
    public function answerInlineQuery(string $inline_query_id, array $results, ?int $cache_time = null, ?bool $is_personal = null, ?string $next_offset = null, ?InlineQueryResultsButton $button = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to set the result of an interaction with a Web App and send a corresponding message on behalf of the user to the chat from which the query originated. On success, a SentWebAppMessage object is returned.
     * @param string $web_app_query_id
     * @param InlineQueryResult $result
     * @return SentWebAppMessage
     */
    public function answerWebAppQuery(string $web_app_query_id, InlineQueryResult $result): SentWebAppMessage
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Stores a message that can be sent by a user of a Mini App. Returns a PreparedInlineMessage object.
     * @param int $user_id
     * @param InlineQueryResult $result
     * @param bool $allow_user_chats
     * @param bool $allow_bot_chats
     * @param bool $allow_group_chats
     * @param bool $allow_channel_chats
     * @return PreparedInlineMessage
     */
    public function savePreparedInlineMessage(int $user_id, InlineQueryResult $result, ?bool $allow_user_chats = null, ?bool $allow_bot_chats = null, ?bool $allow_group_chats = null, ?bool $allow_channel_chats = null): PreparedInlineMessage
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send invoices. On success, the sent Message is returned.
     * @param int|string $chat_id
     * @param int $message_thread_id
     * @param int $direct_messages_topic_id
     * @param string $title
     * @param string $description
     * @param string $payload
     * @param string $provider_token
     * @param string $currency
     * @param LabeledPrice[] $prices
     * @param int $max_tip_amount
     * @param array $suggested_tip_amounts
     * @param string $start_parameter
     * @param string $provider_data
     * @param string $photo_url
     * @param int $photo_size
     * @param int $photo_width
     * @param int $photo_height
     * @param bool $need_name
     * @param bool $need_phone_number
     * @param bool $need_email
     * @param bool $need_shipping_address
     * @param bool $send_phone_number_to_provider
     * @param bool $send_email_to_provider
     * @param bool $is_flexible
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param SuggestedPostParameters $suggested_post_parameters
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup $reply_markup
     * @return Message
     */
    public function sendInvoice(int|string $chat_id, string $title, string $description, string $payload, string $currency, array $prices, ?int $message_thread_id = null, ?int $direct_messages_topic_id = null, ?string $provider_token = null, ?int $max_tip_amount = null, ?array $suggested_tip_amounts = null, ?string $start_parameter = null, ?string $provider_data = null, ?string $photo_url = null, ?int $photo_size = null, ?int $photo_width = null, ?int $photo_height = null, ?bool $need_name = null, ?bool $need_phone_number = null, ?bool $need_email = null, ?bool $need_shipping_address = null, ?bool $send_phone_number_to_provider = null, ?bool $send_email_to_provider = null, ?bool $is_flexible = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?SuggestedPostParameters $suggested_post_parameters = null, ?ReplyParameters $reply_parameters = null, ?InlineKeyboardMarkup $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to create a link for an invoice. Returns the created invoice link as String on success.
     * @param string $business_connection_id
     * @param string $title
     * @param string $description
     * @param string $payload
     * @param string $provider_token
     * @param string $currency
     * @param LabeledPrice[] $prices
     * @param int $subscription_period
     * @param int $max_tip_amount
     * @param array $suggested_tip_amounts
     * @param string $provider_data
     * @param string $photo_url
     * @param int $photo_size
     * @param int $photo_width
     * @param int $photo_height
     * @param bool $need_name
     * @param bool $need_phone_number
     * @param bool $need_email
     * @param bool $need_shipping_address
     * @param bool $send_phone_number_to_provider
     * @param bool $send_email_to_provider
     * @param bool $is_flexible
     * @return string
     */
    public function createInvoiceLink(string $title, string $description, string $payload, string $currency, array $prices, ?string $business_connection_id = null, ?string $provider_token = null, ?int $subscription_period = null, ?int $max_tip_amount = null, ?array $suggested_tip_amounts = null, ?string $provider_data = null, ?string $photo_url = null, ?int $photo_size = null, ?int $photo_width = null, ?int $photo_height = null, ?bool $need_name = null, ?bool $need_phone_number = null, ?bool $need_email = null, ?bool $need_shipping_address = null, ?bool $send_phone_number_to_provider = null, ?bool $send_email_to_provider = null, ?bool $is_flexible = null): string
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * If you sent an invoice requesting a shipping address and the parameter is_flexible was specified, the Bot API will send an Update with a shipping_query field to the bot. Use this method to reply to shipping queries. On success, True is returned.
     * @param string $shipping_query_id
     * @param bool $ok
     * @param ShippingOption[] $shipping_options
     * @param string $error_message
     * @return bool
     */
    public function answerShippingQuery(string $shipping_query_id, bool $ok, ?array $shipping_options = null, ?string $error_message = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Once the user has confirmed their payment and shipping details, the Bot API sends the final confirmation in the form of an Update with the field pre_checkout_query. Use this method to respond to such pre-checkout queries. On success, True is returned. Note: The Bot API must receive an answer within 10 seconds after the pre-checkout query was sent.
     * @param string $pre_checkout_query_id
     * @param bool $ok
     * @param string $error_message
     * @return bool
     */
    public function answerPreCheckoutQuery(string $pre_checkout_query_id, bool $ok, ?string $error_message = null): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * A method to get the current Telegram Stars balance of the bot. Requires no parameters. On success, returns a StarAmount object.
     * @return StarAmount
     */
    public function getMyStarBalance(): StarAmount
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Returns the bot's Telegram Star transactions in chronological order. On success, returns a StarTransactions object.
     * @param int $offset
     * @param int $limit
     * @return StarTransactions
     */
    public function getStarTransactions(?int $offset = null, ?int $limit = null): StarTransactions
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Refunds a successful payment in Telegram Stars. Returns True on success.
     * @param int $user_id
     * @param string $telegram_payment_charge_id
     * @return bool
     */
    public function refundStarPayment(int $user_id, string $telegram_payment_charge_id): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Allows the bot to cancel or re-enable extension of a subscription paid in Telegram Stars. Returns True on success.
     * @param int $user_id
     * @param string $telegram_payment_charge_id
     * @param bool $is_canceled
     * @return bool
     */
    public function editUserStarSubscription(int $user_id, string $telegram_payment_charge_id, bool $is_canceled): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Informs a user that some of the Telegram Passport elements they provided contains errors. The user will not be able to re-submit their Passport to you until the errors are fixed (the contents of the field for which you returned the error must change). Returns True on success.
     * Use this if the data submitted by the user doesn't satisfy the standards your service requires for any reason. For example, if a birthday date seems invalid, a submitted document is blurry, a scan shows evidence of tampering, etc. Supply some details in the error message to make sure the user knows how to correct the issues.
     * @param int $user_id
     * @param PassportElementError[] $errors
     * @return bool
     */
    public function setPassportDataErrors(int $user_id, array $errors): bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to send a game. On success, the sent Message is returned.
     * @param string $business_connection_id
     * @param int $chat_id
     * @param int $message_thread_id
     * @param string $game_short_name
     * @param bool $disable_notification
     * @param bool $protect_content
     * @param bool $allow_paid_broadcast
     * @param string $message_effect_id
     * @param ReplyParameters $reply_parameters
     * @param InlineKeyboardMarkup $reply_markup
     * @return Message
     */
    public function sendGame(int $chat_id, string $game_short_name, ?string $business_connection_id = null, ?int $message_thread_id = null, ?bool $disable_notification = null, ?bool $protect_content = null, ?bool $allow_paid_broadcast = null, ?string $message_effect_id = null, ?ReplyParameters $reply_parameters = null, ?InlineKeyboardMarkup $reply_markup = null): Message
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to set the score of the specified user in a game message. On success, if the message is not an inline message, the Message is returned, otherwise True is returned. Returns an error, if the new score is not greater than the user's current score in the chat and force is False.
     * @param int $user_id
     * @param int $score
     * @param bool $force
     * @param bool $disable_edit_message
     * @param int $chat_id
     * @param int $message_id
     * @param string $inline_message_id
     * @return Message|bool
     */
    public function setGameScore(int $user_id, int $score, ?bool $force = null, ?bool $disable_edit_message = null, ?int $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null): Message|bool
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }

    /**
     * Use this method to get data for high score tables. Will return the score of the specified user and several of their neighbors in a game. Returns an Array of GameHighScore objects.
     * @param int $user_id
     * @param int $chat_id
     * @param int $message_id
     * @param string $inline_message_id
     * @return GameHighScore[]
     */
    public function getGameHighScores(int $user_id, ?int $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null): array
    {
        $args = get_defined_vars();
        unset($args['this']);
        return $this->sender(__FUNCTION__, $args);
    }
}