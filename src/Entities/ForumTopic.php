<?php

namespace Al3x5\xBot\Entities;

/**
 * ForumTopic Entity
 * @property int $message_thread_id;
 * @property string $name;
 * @property int $icon_color;
 * @property string $icon_custom_emoji_id;
 */
class ForumTopic extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
