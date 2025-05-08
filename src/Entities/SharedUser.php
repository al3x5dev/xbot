<?php

namespace Al3x5\xBot\Entities;

/**
 * SharedUser Entity
 * @property int $user_id;
 * @property string $first_name;
 * @property string $last_name;
 * @property string $username;
 * @property \PhotoSize[] $photo;
 */
class SharedUser extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
