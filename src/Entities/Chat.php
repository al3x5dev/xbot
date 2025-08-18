<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Chat Entity
 * @property int $id
 * @property string $type
 * @property string $title
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property bool $is_forum
 * @property bool $is_direct_messages
 */
class Chat extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
