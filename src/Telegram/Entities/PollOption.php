<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PollOption Entity
 * @property string $persistent_id
 * @property string $text
 * @property MessageEntity[] $text_entities
 * @property int $voter_count
 * @property User $added_by_user
 * @property Chat $added_by_chat
 * @property int $addition_date
 */
class PollOption extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'text_entities' => [MessageEntity::class],
            'added_by_user' => User::class,
            'added_by_chat' => Chat::class,
        ];
    }
}
