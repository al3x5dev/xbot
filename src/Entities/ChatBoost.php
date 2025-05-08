<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatBoost Entity
 * @property string $boost_id;
 * @property int $add_date;
 * @property int $expiration_date;
 * @property ChatBoostSource $source;
 */
class ChatBoost extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'source' => ChatBoostSource::class,
        ];
    }
}
