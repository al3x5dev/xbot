<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockTable Entity
 * @property string $type
 * @property RichBlockTableCell[] $cells
 * @property bool $is_bordered
 * @property bool $is_striped
 * @property RichText $caption
 */
class RichBlockTable extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'cells' => [RichBlockTableCell::class],
            'caption' => RichText::class,
        ];
    }
}
