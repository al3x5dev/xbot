<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextTextMention Entity
 * @property string $type
 * @property RichText $text
 * @property User $user
 */
class RichTextTextMention extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
            'user' => User::class,
        ];
    }
}
