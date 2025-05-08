<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatBoostSourceGiveaway Entity
 * @property string $source;
 * @property int $giveaway_message_id;
 * @property User $user;
 * @property int $prize_star_count;
 * @property bool $is_unclaimed;
 */
class ChatBoostSourceGiveaway extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
