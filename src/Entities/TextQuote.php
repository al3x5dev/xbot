<?php

namespace Al3x5\xBot\Entities;

/**
 * TextQuote Entity
 * @property string $text;
 * @property \MessageEntity[] $entities;
 * @property int $position;
 * @property bool $is_manual;
 */
class TextQuote extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
