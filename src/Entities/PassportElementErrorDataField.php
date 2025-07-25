<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PassportElementErrorDataField Entity
 * @property string $source
 * @property string $type
 * @property string $field_name
 * @property string $data_hash
 * @property string $message
 */
class PassportElementErrorDataField extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
