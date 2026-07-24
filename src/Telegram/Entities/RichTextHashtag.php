<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextHashtag Entity
 * @property string $type
 * @property RichText $text
 * @property string $hashtag
 */
class RichTextHashtag extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
