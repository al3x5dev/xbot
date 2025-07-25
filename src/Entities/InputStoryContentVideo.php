<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputStoryContentVideo Entity
 * @property string $type
 * @property string $video
 * @property float $duration
 * @property float $cover_frame_timestamp
 * @property bool $is_animation
 */
class InputStoryContentVideo extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
