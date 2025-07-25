<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * GiveawayCompleted Entity
 * @property int $winner_count
 * @property int $unclaimed_prize_count
 * @property Message $giveaway_message
 * @property bool $is_star_giveaway
 */
class GiveawayCompleted extends Entity
{
    protected function setEntities(): array
    {
        return [
            'giveaway_message' => Message::class,
        ];
    }
}
