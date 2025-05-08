<?php

namespace Al3x5\xBot\Entities;

/**
 * PhotoSize Entity
 * @property string $file_id;
 * @property string $file_unique_id;
 * @property int $width;
 * @property int $height;
 * @property int $file_size;
 */
class PhotoSize extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
