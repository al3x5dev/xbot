<?php

namespace Al3x5\xBot\Entities;

/**
 * ChosenInlineResult Entity
 * @property string $result_id;
 * @property User $from;
 * @property Location $location;
 * @property string $inline_message_id;
 * @property string $query;
 */
class ChosenInlineResult extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'from' => User::class,
            'location' => Location::class,
        ];
    }
}
