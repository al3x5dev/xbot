<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatBoostSourceGiveaway Entity
 * @property string $source
 * @property int $giveaway_message_id
 * @property User $user
 * @property int $prize_star_count
 * @property bool $is_unclaimed
 */
class ChatBoostSourceGiveaway extends Entity
{
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
