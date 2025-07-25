<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * TransactionPartnerChat Entity
 * @property string $type
 * @property Chat $chat
 * @property Gift $gift
 */
class TransactionPartnerChat extends Entity
{
    protected function setEntities(): array
    {
        return [
            'chat' => Chat::class,
            'gift' => Gift::class,
        ];
    }
}
