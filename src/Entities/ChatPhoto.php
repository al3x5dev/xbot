<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatPhoto Entity
 * @property string $small_file_id
 * @property string $small_file_unique_id
 * @property string $big_file_id
 * @property string $big_file_unique_id
 */
class ChatPhoto extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
