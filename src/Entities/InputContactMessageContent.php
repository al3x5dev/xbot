<?php

namespace Al3x5\xBot\Entities;

/**
 * InputContactMessageContent Entity
 * @property string $phone_number;
 * @property string $first_name;
 * @property string $last_name;
 * @property string $vcard;
 */
class InputContactMessageContent extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
