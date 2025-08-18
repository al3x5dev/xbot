<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ReplyParameters Entity
 * @property int $message_id
 * @property int $chat_id
 * @property bool $allow_sending_without_reply
 * @property string $quote
 * @property string $quote_parse_mode
 * @property MessageEntity[] $quote_entities
 * @property int $quote_position
 * @property int $checklist_task_id
 */
class ReplyParameters extends Entity
{
    protected function setEntities(): array
    {
        return [
            'quote_entities' => [MessageEntity::class],
        ];
    }
}
