<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Giveaway Entity
 * @property Chat[] $chats
 * @property int $winners_selection_date
 * @property int $winner_count
 * @property bool $only_new_members
 * @property bool $has_public_winners
 * @property string $prize_description
 * @property string $country_codes
 * @property int $prize_star_count
 * @property int $premium_subscription_month_count
 */
class Giveaway extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chats' => [Chat::class],
        ];
    }
}
