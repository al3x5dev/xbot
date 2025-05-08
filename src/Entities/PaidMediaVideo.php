<?php

namespace Al3x5\xBot\Entities;

/**
 * PaidMediaVideo Entity
 * @property string $type;
 * @property Video $video;
 */
class PaidMediaVideo extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'video' => Video::class,
        ];
    }
}
