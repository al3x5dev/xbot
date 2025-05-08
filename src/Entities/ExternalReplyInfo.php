<?php

namespace Al3x5\xBot\Entities;

/**
 * ExternalReplyInfo Entity
 * @property MessageOrigin $origin;
 * @property Chat $chat;
 * @property int $message_id;
 * @property LinkPreviewOptions $link_preview_options;
 * @property Animation $animation;
 * @property Audio $audio;
 * @property Document $document;
 * @property PaidMediaInfo $paid_media;
 * @property \PhotoSize[] $photo;
 * @property Sticker $sticker;
 * @property Story $story;
 * @property Video $video;
 * @property VideoNote $video_note;
 * @property Voice $voice;
 * @property bool $has_media_spoiler;
 * @property Contact $contact;
 * @property Dice $dice;
 * @property Game $game;
 * @property Giveaway $giveaway;
 * @property GiveawayWinners $giveaway_winners;
 * @property Invoice $invoice;
 * @property Location $location;
 * @property Poll $poll;
 * @property Venue $venue;
 */
class ExternalReplyInfo extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'origin' => MessageOrigin::class,
            'chat' => Chat::class,
            'link_preview_options' => LinkPreviewOptions::class,
            'animation' => Animation::class,
            'audio' => Audio::class,
            'document' => Document::class,
            'paid_media' => PaidMediaInfo::class,
            'sticker' => Sticker::class,
            'story' => Story::class,
            'video' => Video::class,
            'video_note' => VideoNote::class,
            'voice' => Voice::class,
            'contact' => Contact::class,
            'dice' => Dice::class,
            'game' => Game::class,
            'giveaway' => Giveaway::class,
            'giveaway_winners' => GiveawayWinners::class,
            'invoice' => Invoice::class,
            'location' => Location::class,
            'poll' => Poll::class,
            'venue' => Venue::class,
        ];
    }
}
