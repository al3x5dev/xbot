<?php

namespace Al3x5\xBot\Entities;

/**
 * InputMediaPhoto Entity
 * @property string $type;
 * @property string $media;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property bool $show_caption_above_media;
 * @property bool $has_spoiler;
 */
class InputMediaPhoto extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
