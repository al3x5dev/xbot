<?php

namespace Al3x5\xBot\Entities;

/**
 * Voice Entity
 * @property string $file_id;
 * @property string $file_unique_id;
 * @property int $duration;
 * @property string $mime_type;
 * @property int $file_size;
 */
class Voice extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
