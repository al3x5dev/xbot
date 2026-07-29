<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockListItem Entity
 * @property string $label
 * @property RichBlock[] $blocks
 * @property bool $has_checkbox
 * @property bool $is_checked
 * @property int $value
 * @property string $type
 */
class RichBlockListItem extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [RichBlock::class],
        ];
    }
}
