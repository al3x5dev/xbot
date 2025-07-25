<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * OwnedGiftUnique Entity
 * @property string $type
 * @property UniqueGift $gift
 * @property string $owned_gift_id
 * @property User $sender_user
 * @property int $send_date
 * @property bool $is_saved
 * @property bool $can_be_transferred
 * @property int $transfer_star_count
 * @property int $next_transfer_date
 */
class OwnedGiftUnique extends Entity
{
    protected function setEntities(): array
    {
        return [
            'gift' => UniqueGift::class,
            'sender_user' => User::class,
        ];
    }
}
