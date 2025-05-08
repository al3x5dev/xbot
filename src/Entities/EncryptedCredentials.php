<?php

namespace Al3x5\xBot\Entities;

/**
 * EncryptedCredentials Entity
 * @property string $data;
 * @property string $hash;
 * @property string $secret;
 */
class EncryptedCredentials extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
