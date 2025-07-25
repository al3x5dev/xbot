<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PassportElementErrorFiles Entity
 * @property string $source
 * @property string $type
 * @property string $file_hashes
 * @property string $message
 */
class PassportElementErrorFiles extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
