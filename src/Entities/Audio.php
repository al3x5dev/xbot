<?php

namespace Al3x5\xBot\Entities;

/**
 * Audio Entity
 * @property string $file_id;
 * @property string $file_unique_id;
 * @property int $duration;
 * @property string $performer;
 * @property string $title;
 * @property string $file_name;
 * @property string $mime_type;
 * @property int $file_size;
 * @property PhotoSize $thumbnail;
 */
class Audio extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'thumbnail' => PhotoSize::class,
        ];
    }
}
