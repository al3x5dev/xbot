<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PollMedia Entity
 * @property Animation $animation
 * @property Audio $audio
 * @property Document $document
 * @property LivePhoto $live_photo
 * @property Location $location
 * @property PhotoSize[] $photo
 * @property Sticker $sticker
 * @property Venue $venue
 * @property Video $video
 */
class PollMedia extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'animation' => Animation::class,
            'audio' => Audio::class,
            'document' => Document::class,
            'live_photo' => LivePhoto::class,
            'location' => Location::class,
            'photo' => [PhotoSize::class],
            'sticker' => Sticker::class,
            'venue' => Venue::class,
            'video' => Video::class,
        ];
    }
}
