<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatBoostRemoved Entity
 * @property Chat $chat;
 * @property string $boost_id;
 * @property int $remove_date;
 * @property ChatBoostSource $source;
 */
class ChatBoostRemoved extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class,
            'source' => ChatBoostSource::class,
        ];
    }
}
