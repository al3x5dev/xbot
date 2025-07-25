<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ForumTopicCreated Entity
 * @property string $name
 * @property int $icon_color
 * @property string $icon_custom_emoji_id
 */
class ForumTopicCreated extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
