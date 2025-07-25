<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputPollOption Entity
 * @property string $text
 * @property string $text_parse_mode
 * @property MessageEntity[] $text_entities
 */
class InputPollOption extends Entity
{
    protected function setEntities(): array
    {
        return [
            'text_entities' => [MessageEntity::class],
        ];
    }
}
