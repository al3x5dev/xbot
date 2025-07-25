<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputPaidMediaVideo Entity
 * @property string $type
 * @property string $media
 * @property string $thumbnail
 * @property string $cover
 * @property int $start_timestamp
 * @property int $width
 * @property int $height
 * @property int $duration
 * @property bool $supports_streaming
 */
class InputPaidMediaVideo extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
