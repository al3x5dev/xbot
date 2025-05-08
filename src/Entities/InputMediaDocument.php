<?php

namespace Al3x5\xBot\Entities;

/**
 * InputMediaDocument Entity
 * @property string $type;
 * @property string $media;
 * @property string $thumbnail;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property bool $disable_content_type_detection;
 */
class InputMediaDocument extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
