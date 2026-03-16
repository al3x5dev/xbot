<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PassportElementErrorFiles Entity
 * @property string $source
 * @property string $type
 * @property array $file_hashes
 * @property string $message
 */
class PassportElementErrorFiles extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
