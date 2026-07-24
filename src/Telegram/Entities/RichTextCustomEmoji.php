<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextCustomEmoji Entity
 * @property string $type
 * @property string $custom_emoji_id
 * @property string $alternative_text
 */
class RichTextCustomEmoji extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
