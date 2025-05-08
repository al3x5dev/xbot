<?php

namespace Al3x5\xBot\Entities;

/**
 * ReplyParameters Entity
 * @property int $message_id;
 * @property int $chat_id;
 * @property bool $allow_sending_without_reply;
 * @property string $quote;
 * @property string $quote_parse_mode;
 * @property \MessageEntity[] $quote_entities;
 * @property int $quote_position;
 */
class ReplyParameters extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
