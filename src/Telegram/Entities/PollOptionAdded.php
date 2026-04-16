<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PollOptionAdded Entity
 * @property MaybeInaccessibleMessage $poll_message
 * @property string $option_persistent_id
 * @property string $option_text
 * @property MessageEntity[] $option_text_entities
 */
class PollOptionAdded extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'poll_message' => MaybeInaccessibleMessage::class,
            'option_text_entities' => [MessageEntity::class],
        ];
    }
}
