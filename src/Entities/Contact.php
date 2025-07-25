<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Contact Entity
 * @property string $phone_number
 * @property string $first_name
 * @property string $last_name
 * @property int $user_id
 * @property string $vcard
 */
class Contact extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
