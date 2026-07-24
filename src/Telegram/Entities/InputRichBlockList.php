<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockList Entity
 * @property string $type
 * @property InputRichBlockListItem[] $items
 */
class InputRichBlockList extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'items' => [InputRichBlockListItem::class],
        ];
    }
}
