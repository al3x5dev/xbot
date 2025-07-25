<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputChecklistTask Entity
 * @property int $id
 * @property string $text
 * @property string $parse_mode
 * @property MessageEntity[] $text_entities
 */
class InputChecklistTask extends Entity
{
    protected function setEntities(): array
    {
        return [
            'text_entities' => [MessageEntity::class],
        ];
    }
}
