<?php

namespace Al3x5\xBot\Entities;

/**
 * VideoNote Entity
 * @property string $file_id;
 * @property string $file_unique_id;
 * @property int $length;
 * @property int $duration;
 * @property PhotoSize $thumbnail;
 * @property int $file_size;
 */
class VideoNote extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'thumbnail' => PhotoSize::class,
        ];
    }
}
