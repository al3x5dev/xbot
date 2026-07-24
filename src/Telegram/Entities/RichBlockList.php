<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockList Entity
 * @property string $type
 * @property RichBlockListItem[] $items
 */
class RichBlockList extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'items' => [RichBlockListItem::class],
        ];
    }
}
