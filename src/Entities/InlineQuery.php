<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQuery Entity
 * @property string $id;
 * @property User $from;
 * @property string $query;
 * @property string $offset;
 * @property string $chat_type;
 * @property Location $location;
 */
class InlineQuery extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'from' => User::class,
            'location' => Location::class,
        ];
    }
}
