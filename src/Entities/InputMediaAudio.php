<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputMediaAudio Entity
 * @property string $type
 * @property string $media
 * @property string $thumbnail
 * @property string $caption
 * @property string $parse_mode
 * @property MessageEntity[] $caption_entities
 * @property int $duration
 * @property string $performer
 * @property string $title
 */
class InputMediaAudio extends Entity
{
    protected function setEntities(): array
    {
        return [
            'caption_entities' => [MessageEntity::class],
        ];
    }
}
