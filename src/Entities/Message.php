<?php

namespace Al3x5\xBot\Entities;

/**
 * Message Entity
 */
class Message extends Base
{
    protected function getEntities(): array
    {
        return [
            'from' => User::class,
            'chat' => Chat::class,
            'entities' => MessageEntity::class,
            /*'sender_chat'=> Chat::class,
            'sender_business_bot'=>User::class,
            'forward_origin'=>MessageOrigin::class
            

            /*is_topic_message 	True 	Optional. True, if the message is sent to a forum topic
is_automatic_forward 	True 	Optional. True, if the message is a channel post that was automatically forwarded to the connected discussion group
reply_to_message 	Message 	Optional. For replies in the same chat and message thread, the original message. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
external_reply 	ExternalReplyInfo 	Optional. Information about the message that is being replied to, which may come from another chat or forum topic
quote 	TextQuote 	Optional. For replies that quote part of the original message, the quoted part of the message
reply_to_story 	Story 	Optional. For replies to a story, the original story
via_bot 	User 	Optional. Bot through which the message was sent
edit_date 	Integer 	Optional. Date the message was last edited in Unix time
has_protected_content 	True 	Optional. True, if the message can't be forwarded
is_from_offline 	True 	Optional. True, if the message was sent by an implicit action, for example, as an away or a greeting business message, or as a scheduled message
media_group_id 	String 	Optional. The unique identifier of a media message group this message belongs to
author_signature 	String 	Optional. Signature of the post author for messages in channels, or the custom title of an anonymous group administrator
text 	String 	Optional. For text messages, the actual UTF-8 text of the message
entities 	Array of MessageEntity 	Optional. For text messages, special entities like usernames, URLs, bot commands, etc. that appear in the text
link_preview_options 	LinkPreviewOptions 	Optional. Options used for link preview generation for the message, if it is a text message and link preview options were changed
effect_id 	String 	Optional. Unique identifier of the message effect added to the message
animation 	Animation 	Optional. Message is an animation, information about the animation. For backward compatibility, when this field is set, the document field will also be set
audio 	Audio 	Optional. Message is an audio file, information about the file
document 	Document 	Optional. Message is a general file, information about the file
photo 	Array of PhotoSize 	Optional. Message is a photo, available sizes of the photo
sticker 	Sticker 	Optional. Message is a sticker, information about the sticker
story 	Story 	Optional. Message is a forwarded story
video 	Video 	Optional. Message is a video, information about the video
video_note 	VideoNote 	Optional. Message is a video note, information about the video message
voice 	Voice 	Optional. Message is a voice message, information about the file
caption 	String 	Optional. Caption for the animation, audio, document, photo, video or voice
caption_entities 	Array of MessageEntity 	Optional. For messages with a caption, special entities like usernames, URLs, bot commands, etc. that appear in the caption
show_caption_above_media 	True 	Optional. True, if the caption must be shown above the message media
has_media_spoiler 	True 	Optional. True, if the message media is covered by a spoiler animation
contact 	Contact 	Optional. Message is a shared contact, information about the contact
dice 	Dice 	Optional. Message is a dice with random value
game 	Game 	Optional. Message is a game, information about the game. More about games »
poll 	Poll 	Optional. Message is a native poll, information about the poll
venue 	Venue 	Optional. Message is a venue, information about the venue. For backward compatibility, when this field is set, the location field will also be set
location 	Location 	Optional. Message is a shared location, information about the location
new_chat_members 	Array of User 	Optional. New members that were added to the group or supergroup and information about them (the bot itself may be one of these members)
left_chat_member 	User 	Optional. A member was removed from the group, information about them (this member may be the bot itself)
new_chat_title 	String 	Optional. A chat title was changed to this value
new_chat_photo 	Array of PhotoSize 	Optional. A chat photo was change to this value
delete_chat_photo 	True 	Optional. Service message: the chat photo was deleted
group_chat_created 	True 	Optional. Service message: the group has been created
supergroup_chat_created 	True 	Optional. Service message: the supergroup has been created. This field can't be received in a message coming through updates, because bot can't be a member of a supergroup when it is created. It can only be found in reply_to_message if someone replies to a very first message in a directly created supergroup.
channel_chat_created 	True 	Optional. Service message: the channel has been created. This field can't be received in a message coming through updates, because bot can't be a member of a channel when it is created. It can only be found in reply_to_message if someone replies to a very first message in a channel.
message_auto_delete_timer_changed 	MessageAutoDeleteTimerChanged 	Optional. Service message: auto-delete timer settings changed in the chat
migrate_to_chat_id 	Integer 	Optional. The group has been migrated to a supergroup with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
migrate_from_chat_id 	Integer 	Optional. The supergroup has been migrated from a group with the specified identifier. This number may have more than 32 significant bits and some programming languages may have difficulty/silent defects in interpreting it. But it has at most 52 significant bits, so a signed 64-bit integer or double-precision float type are safe for storing this identifier.
pinned_message 	MaybeInaccessibleMessage 	Optional. Specified message was pinned. Note that the Message object in this field will not contain further reply_to_message fields even if it itself is a reply.
invoice 	Invoice 	Optional. Message is an invoice for a payment, information about the invoice. More about payments »
successful_payment 	SuccessfulPayment 	Optional. Message is a service message about a successful payment, information about the payment. More about payments »
users_shared 	UsersShared 	Optional. Service message: users were shared with the bot
chat_shared 	ChatShared 	Optional. Service message: a chat was shared with the bot
connected_website 	String 	Optional. The domain name of the website on which the user has logged in. More about Telegram Login »
write_access_allowed 	WriteAccessAllowed 	Optional. Service message: the user allowed the bot to write messages after adding it to the attachment or side menu, launching a Web App from a link, or accepting an explicit request from a Web App sent by the method requestWriteAccess
passport_data 	PassportData 	Optional. Telegram Passport data
proximity_alert_triggered 	ProximityAlertTriggered 	Optional. Service message. A user in the chat triggered another user's proximity alert while sharing Live Location.
boost_added 	ChatBoostAdded 	Optional. Service message: user boosted the chat
chat_background_set 	ChatBackground 	Optional. Service message: chat background set
forum_topic_created 	ForumTopicCreated 	Optional. Service message: forum topic created
forum_topic_edited 	ForumTopicEdited 	Optional. Service message: forum topic edited
forum_topic_closed 	ForumTopicClosed 	Optional. Service message: forum topic closed
forum_topic_reopened 	ForumTopicReopened 	Optional. Service message: forum topic reopened
general_forum_topic_hidden 	GeneralForumTopicHidden 	Optional. Service message: the 'General' forum topic hidden
general_forum_topic_unhidden 	GeneralForumTopicUnhidden 	Optional. Service message: the 'General' forum topic unhidden
giveaway_created 	GiveawayCreated 	Optional. Service message: a scheduled giveaway was created
giveaway 	Giveaway 	Optional. The message is a scheduled giveaway message
giveaway_winners 	GiveawayWinners 	Optional. A giveaway with public winners was completed
giveaway_completed 	GiveawayCompleted 	Optional. Service message: a giveaway without public winners was completed
video_chat_scheduled 	VideoChatScheduled 	Optional. Service message: video chat scheduled
video_chat_started 	VideoChatStarted 	Optional. Service message: video chat started
video_chat_ended 	VideoChatEnded 	Optional. Service message: video chat ended
video_chat_participants_invited 	VideoChatParticipantsInvited 	Optional. Service message: new participants invited to a video chat
web_app_data 	WebAppData 	Optional. Service message: data sent by a Web App
reply_markup 	InlineKeyboardMarkup 	Optional. Inline keyboard attached to the message. login_url buttons are represented as ordinary url buttons.*/
        ];
    }

    public function isCommand(): bool
    {
        if (isset($this->entities)) {
            return $this->get('entities')->type == 'bot_command';
        }

        return false;
    }
}
