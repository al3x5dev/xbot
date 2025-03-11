<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQuery class
 * 
 * @property public string $id
 * @property public User $from
 * @property public string $query
 * @property public string $offset
 * @property public string $chat_type
 * @property public Location $location
 */
class InlineQuery extends Base
{
    public function getEntities(): array
    {
        return [
            'from' => User::class
        ];
    }
}
