<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockPreformatted Entity
 * @property string $type
 * @property RichText $text
 * @property string $language
 */
class RichBlockPreformatted extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
