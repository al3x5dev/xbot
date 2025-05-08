<?php

namespace Al3x5\xBot\Entities;

/**
 * OwnedGiftUnique Entity
 * @property string $type;
 * @property UniqueGift $gift;
 * @property string $owned_gift_id;
 * @property User $sender_user;
 * @property int $send_date;
 * @property bool $is_saved;
 * @property bool $can_be_transferred;
 * @property int $transfer_star_count;
 */
class OwnedGiftUnique extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'gift' => UniqueGift::class,
            'sender_user' => User::class,
        ];
    }
}
