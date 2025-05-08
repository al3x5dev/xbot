<?php

namespace Al3x5\xBot\Entities;

/**
 * PassportFile Entity
 * @property string $file_id;
 * @property string $file_unique_id;
 * @property int $file_size;
 * @property int $file_date;
 */
class PassportFile extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
