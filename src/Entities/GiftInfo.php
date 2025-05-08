<?php

namespace Al3x5\xBot\Entities;

/**
 * GiftInfo Entity
 * @property Gift $gift;
 * @property string $owned_gift_id;
 * @property int $convert_star_count;
 * @property int $prepaid_upgrade_star_count;
 * @property bool $can_be_upgraded;
 * @property string $text;
 * @property \MessageEntity[] $entities;
 * @property bool $is_private;
 */
class GiftInfo extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'gift' => Gift::class,
        ];
    }
}
