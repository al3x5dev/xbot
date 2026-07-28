<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockAnchor Entity
 * @property string $type
 * @property string $name
 */
class RichBlockAnchor extends RichBlock
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
