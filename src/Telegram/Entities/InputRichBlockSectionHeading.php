<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockSectionHeading Entity
 * @property string $type
 * @property RichText $text
 * @property int $size
 */
class InputRichBlockSectionHeading extends InputRichBlock
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
