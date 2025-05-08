<?php

namespace Al3x5\xBot\Entities;

/**
 * InputPaidMediaVideo Entity
 * @property string $type;
 * @property string $media;
 * @property string $thumbnail;
 * @property string $cover;
 * @property int $start_timestamp;
 * @property int $width;
 * @property int $height;
 * @property int $duration;
 * @property bool $supports_streaming;
 */
class InputPaidMediaVideo extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
