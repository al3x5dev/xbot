<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextReferenceLink Entity
 * @property string $type
 * @property RichText $text
 * @property string $reference_name
 */
class RichTextReferenceLink extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
