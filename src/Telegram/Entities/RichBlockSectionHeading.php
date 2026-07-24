<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockSectionHeading Entity
 * @property string $type
 * @property RichText $text
 * @property int $size
 */
class RichBlockSectionHeading extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
