<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichTextAnchor Entity
 * @property string $type
 * @property string $name
 */
class RichTextAnchor extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
