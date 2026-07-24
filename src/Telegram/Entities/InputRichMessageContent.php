<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichMessageContent Entity
 * @property InputRichMessage $rich_message
 */
class InputRichMessageContent extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'rich_message' => InputRichMessage::class,
        ];
    }
}
