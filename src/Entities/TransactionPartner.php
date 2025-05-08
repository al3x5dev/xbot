<?php

namespace Al3x5\xBot\Entities;

/**
 * TransactionPartner Entity
 */
class TransactionPartner extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): TransactionPartnerUser|TransactionPartnerChat|TransactionPartnerAffiliateProgram|TransactionPartnerFragment|TransactionPartnerTelegramAds|TransactionPartnerTelegramApi|TransactionPartnerOther
    {
        return match ($this->type) {
            'user' => new TransactionPartnerUser($this->propertys),
            'chat' => new TransactionPartnerChat($this->propertys),
            'affiliate_program' => new TransactionPartnerAffiliateProgram($this->propertys),
            'fragment' => new TransactionPartnerFragment($this->propertys),
            'telegram_ads' => new TransactionPartnerTelegramAds($this->propertys),
            'telegram_api' => new TransactionPartnerTelegramApi($this->propertys),
            'other' => new TransactionPartnerOther($this->propertys),
        };
    }
}
