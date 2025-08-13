<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * TransactionPartner Entity
 */
class TransactionPartner extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

    public function resolve(): Entity
    {
        return match($this->type) {
            'user' => new TransactionPartnerUser($this->properties),
            'chat' => new TransactionPartnerChat($this->properties),
            'affiliate_program' => new TransactionPartnerAffiliateProgram($this->properties),
            'fragment' => new TransactionPartnerFragment($this->properties),
            'telegram_ads' => new TransactionPartnerTelegramAds($this->properties),
            'telegram_api' => new TransactionPartnerTelegramApi($this->properties),
            'other' => new TransactionPartnerOther($this->properties),
            default => throw new \InvalidArgumentException('Unknown TransactionPartner type: ' . $this->type),
        };
    }
}
