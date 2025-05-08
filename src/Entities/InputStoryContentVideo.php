<?php

namespace Al3x5\xBot\Entities;

/**
 * InputStoryContentVideo Entity
 * @property string $type;
 * @property string $video;
 * @property float $duration;
 * @property float $cover_frame_timestamp;
 * @property bool $is_animation;
 */
class InputStoryContentVideo extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
