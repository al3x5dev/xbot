<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BusinessMessagesDeleted Entity
 * @property string $business_connection_id
 * @property Chat $chat
 * @property array $message_ids
 */
class BusinessMessagesDeleted extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
