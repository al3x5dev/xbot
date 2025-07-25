<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputContactMessageContent Entity
 * @property string $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property string $vcard
 */
class InputContactMessageContent extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
