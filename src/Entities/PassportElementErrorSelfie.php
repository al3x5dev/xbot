<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PassportElementErrorSelfie Entity
 * @property string $source
 * @property string $type
 * @property string $file_hash
 * @property string $message
 */
class PassportElementErrorSelfie extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
