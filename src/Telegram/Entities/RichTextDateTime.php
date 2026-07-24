<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextDateTime Entity
 * @property string $type
 * @property RichText $text
 * @property int $unix_time
 * @property string $date_time_format
 */
class RichTextDateTime extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
