<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextCashtag Entity
 * @property string $type
 * @property RichText $text
 * @property string $cashtag
 */
class RichTextCashtag extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
