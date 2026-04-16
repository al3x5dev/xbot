<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * TransactionPartner Entity
 */
class TransactionPartner extends Entity
{
    
    public const TYPE_USER = 'user';
    public const TYPE_CHAT = 'chat';
    public const TYPE_AFFILIATE_PROGRAM = 'affiliate_program';
    public const TYPE_FRAGMENT = 'fragment';
    public const TYPE_TELEGRAM_ADS = 'telegram_ads';
    public const TYPE_TELEGRAM_API = 'telegram_api';
    public const TYPE_OTHER = 'other';

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

    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_USER => new TransactionPartnerUser($data),
            self::TYPE_CHAT => new TransactionPartnerChat($data),
            self::TYPE_AFFILIATE_PROGRAM => new TransactionPartnerAffiliateProgram($data),
            self::TYPE_FRAGMENT => new TransactionPartnerFragment($data),
            self::TYPE_TELEGRAM_ADS => new TransactionPartnerTelegramAds($data),
            self::TYPE_TELEGRAM_API => new TransactionPartnerTelegramApi($data),
            self::TYPE_OTHER => new TransactionPartnerOther($data),
            default => throw new \InvalidArgumentException('Unknown TransactionPartner type: ' . ($data['type'] ?? 'null')),
        };
    }

}
