<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatBoostSource Entity
 */
class ChatBoostSource extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): ChatBoostSourcePremium|ChatBoostSourceGiftCode|ChatBoostSourceGiveaway
    {
        if ($this->hasProperty('giveaway_message_id')) {
            return new ChatBoostSourceGiveaway($this->propertys);
        }

        return match ($this->propertys['source']) {
            'gift_code' => new ChatBoostSourceGiftCode($this->propertys),
            'premium' => new ChatBoostSourcePremium($this->propertys),
        };
    }
}
