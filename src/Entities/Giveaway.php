<?php

namespace Al3x5\xBot\Entities;

/**
 * Giveaway Entity
 * @property \Chat[] $chats;
 * @property int $winners_selection_date;
 * @property int $winner_count;
 * @property bool $only_new_members;
 * @property bool $has_public_winners;
 * @property string $prize_description;
 * @property array $country_codes;
 * @property int $prize_star_count;
 * @property int $premium_subscription_month_count;
 */
class Giveaway extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
