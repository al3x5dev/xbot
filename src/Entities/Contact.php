<?php

namespace Al3x5\xBot\Entities;

/**
 * Contact Entity
 * @property string $phone_number;
 * @property string $first_name;
 * @property string $last_name;
 * @property int $user_id;
 * @property string $vcard;
 */
class Contact extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
