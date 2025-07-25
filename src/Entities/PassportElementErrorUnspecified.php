<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PassportElementErrorUnspecified Entity
 * @property string $source
 * @property string $type
 * @property string $element_hash
 * @property string $message
 */
class PassportElementErrorUnspecified extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
