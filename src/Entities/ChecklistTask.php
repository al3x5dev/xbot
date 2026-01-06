<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChecklistTask Entity
 * @property int $id
 * @property string $text
 * @property MessageEntity[] $text_entities
 * @property User $completed_by_user
 * @property Chat $completed_by_chat
 * @property int $completion_date
 */
class ChecklistTask extends Entity
{
    protected function setEntities(): array
    {
        return [
            'text_entities' => [MessageEntity::class],
            'completed_by_user' => User::class,
            'completed_by_chat' => Chat::class,
        ];
    }
}
