<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputMediaPhoto Entity
 * @property string $type
 * @property string $media
 * @property string $caption
 * @property string $parse_mode
 * @property MessageEntity[] $caption_entities
 * @property bool $show_caption_above_media
 * @property bool $has_spoiler
 */
class InputMediaPhoto extends Entity
{
    protected function setEntities(): array
    {
        return [
            'caption_entities' => [MessageEntity::class],
        ];
    }
}
