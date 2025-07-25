<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * EncryptedCredentials Entity
 * @property string $data
 * @property string $hash
 * @property string $secret
 */
class EncryptedCredentials extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
