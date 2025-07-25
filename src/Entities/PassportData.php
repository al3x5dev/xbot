<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PassportData Entity
 * @property EncryptedPassportElement[] $data
 * @property EncryptedCredentials $credentials
 */
class PassportData extends Entity
{
    protected function setEntities(): array
    {
        return [
            'data' => [EncryptedPassportElement::class],
            'credentials' => EncryptedCredentials::class,
        ];
    }
}
