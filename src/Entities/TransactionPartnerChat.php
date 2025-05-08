<?php

namespace Al3x5\xBot\Entities;

/**
 * TransactionPartnerChat Entity
 * @property string $type;
 * @property Chat $chat;
 * @property Gift $gift;
 */
class TransactionPartnerChat extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'chat' => Chat::class,
            'gift' => Gift::class,
        ];
    }
}
