<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockListItem Entity
 * @property InputRichBlock[] $blocks
 * @property bool $has_checkbox
 * @property bool $is_checked
 * @property int $value
 * @property string $type
 */
class InputRichBlockListItem extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [InputRichBlock::class],
        ];
    }
}
