<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextBotCommand Entity
 * @property string $type
 * @property RichText $text
 * @property string $bot_command
 */
class RichTextBotCommand extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
