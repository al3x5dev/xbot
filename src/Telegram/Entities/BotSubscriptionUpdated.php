<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BotSubscriptionUpdated Entity
 * @property User $user
 * @property string $invoice_payload
 * @property string $state
 */
class BotSubscriptionUpdated extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'user' => User::class,
        ];
    }
}
