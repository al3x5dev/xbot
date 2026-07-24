<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockTableCell Entity
 * @property RichText $text
 * @property bool $is_header
 * @property int $colspan
 * @property int $rowspan
 * @property string $align
 * @property string $valign
 */
class RichBlockTableCell extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text' => RichText::class,
        ];
    }
}
