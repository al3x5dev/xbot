<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * TransactionPartnerTelegramApi Entity
 * @property string $type
 * @property int $request_count
 */
class TransactionPartnerTelegramApi extends TransactionPartner
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
