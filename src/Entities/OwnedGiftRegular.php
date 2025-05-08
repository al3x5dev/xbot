<?php

namespace Al3x5\xBot\Entities;

/**
 * OwnedGiftRegular Entity
 * @property string $type;
 * @property Gift $gift;
 * @property string $owned_gift_id;
 * @property User $sender_user;
 * @property int $send_date;
 * @property string $text;
 * @property \MessageEntity[] $entities;
 * @property bool $is_private;
 * @property bool $is_saved;
 * @property bool $can_be_upgraded;
 * @property bool $was_refunded;
 * @property int $convert_star_count;
 * @property int $prepaid_upgrade_star_count;
 */
class OwnedGiftRegular extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'gift' => Gift::class,
            'sender_user' => User::class,
        ];
    }
}
