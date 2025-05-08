<?php

namespace Al3x5\xBot\Entities;

/**
 * InputMediaAudio Entity
 * @property string $type;
 * @property string $media;
 * @property string $thumbnail;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property int $duration;
 * @property string $performer;
 * @property string $title;
 */
class InputMediaAudio extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
