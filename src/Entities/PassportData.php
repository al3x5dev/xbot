<?php

namespace Al3x5\xBot\Entities;

/**
 * PassportData Entity
 * @property \EncryptedPassportElement[] $data;
 * @property EncryptedCredentials $credentials;
 */
class PassportData extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'credentials' => EncryptedCredentials::class,
        ];
    }
}
