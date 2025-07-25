<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatBoostRemoved Entity
 * @property Chat $chat
 * @property string $boost_id
 * @property int $remove_date
 * @property ChatBoostSource $source
 */
class ChatBoostRemoved extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'source' => ChatBoostSource::class,
        ];
    }
}
