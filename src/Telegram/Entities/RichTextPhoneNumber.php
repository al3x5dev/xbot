<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextPhoneNumber Entity
 * @property string $type
 * @property RichText $text
 * @property string $phone_number
 */
class RichTextPhoneNumber extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
