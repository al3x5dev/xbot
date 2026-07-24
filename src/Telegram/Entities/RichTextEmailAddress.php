<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextEmailAddress Entity
 * @property string $type
 * @property RichText $text
 * @property string $email_address
 */
class RichTextEmailAddress extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
