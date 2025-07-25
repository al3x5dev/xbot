<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PollOption Entity
 * @property string $text
 * @property MessageEntity[] $text_entities
 * @property int $voter_count
 */
class PollOption extends Entity
{
    protected function setEntities(): array
    {
        return [
            'text_entities' => [MessageEntity::class],
        ];
    }
}
