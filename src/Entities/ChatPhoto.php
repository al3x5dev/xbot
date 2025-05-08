<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatPhoto Entity
 * @property string $small_file_id;
 * @property string $small_file_unique_id;
 * @property string $big_file_id;
 * @property string $big_file_unique_id;
 */
class ChatPhoto extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
