<?php

namespace Al3x5\xBot\Entities;

/**
 * BusinessMessagesDeleted Entity
 * @property string $business_connection_id;
 * @property Chat $chat;
 * @property \Integer[] $message_ids;
 */
class BusinessMessagesDeleted extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class,
        ];
    }
}
