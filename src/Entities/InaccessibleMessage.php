<?php

namespace Al3x5\xBot\Entities;

/**
 * InaccessibleMessage class
 */
class InaccessibleMessage extends Base
{
    /**
     * Chat the message belonged to
     */
    public Chat $chat;

    /**
     * Unique message identifier inside the chat
     */
    public int $message_id;

    /**
     * Always 0. The field can be used to differentiate regular and inaccessible messages.
     */
    public int $date;

    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class
        ];
    }
}
