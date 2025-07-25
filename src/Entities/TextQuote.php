<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * TextQuote Entity
 * @property string $text
 * @property MessageEntity[] $entities
 * @property int $position
 * @property bool $is_manual
 */
class TextQuote extends Entity
{
    protected function setEntities(): array
    {
        return [
            'entities' => [MessageEntity::class],
        ];
    }
}
