<?php

namespace Al3x5\xBot\Entities;

/**
 * Chat Entity
 * @property int $id;
 * @property string $type;
 * @property string $title;
 * @property string $username;
 * @property string $first_name;
 * @property string $last_name;
 * @property bool $is_forum;
 */
class Chat extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
