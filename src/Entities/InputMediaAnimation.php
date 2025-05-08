<?php

namespace Al3x5\xBot\Entities;

/**
 * InputMediaAnimation Entity
 * @property string $type;
 * @property string $media;
 * @property string $thumbnail;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property bool $show_caption_above_media;
 * @property int $width;
 * @property int $height;
 * @property int $duration;
 * @property bool $has_spoiler;
 */
class InputMediaAnimation extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
