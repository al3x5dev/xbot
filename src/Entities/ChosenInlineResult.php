<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChosenInlineResult Entity
 * @property string $result_id
 * @property User $from
 * @property Location $location
 * @property string $inline_message_id
 * @property string $query
 */
class ChosenInlineResult extends Entity
{
    protected function setEntities(): array
    {
        return [
            'from' => User::class,
            'location' => Location::class,
        ];
    }
}
