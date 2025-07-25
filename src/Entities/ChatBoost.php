<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatBoost Entity
 * @property string $boost_id
 * @property int $add_date
 * @property int $expiration_date
 * @property ChatBoostSource $source
 */
class ChatBoost extends Entity
{
    protected function setEntities(): array
    {
        return [
            'source' => ChatBoostSource::class,
        ];
    }
}
