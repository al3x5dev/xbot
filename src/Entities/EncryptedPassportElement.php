<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * EncryptedPassportElement Entity
 * @property string $type
 * @property string $data
 * @property string $phone_number
 * @property string $email
 * @property PassportFile[] $files
 * @property PassportFile $front_side
 * @property PassportFile $reverse_side
 * @property PassportFile $selfie
 * @property PassportFile[] $translation
 * @property string $hash
 */
class EncryptedPassportElement extends Entity
{
    protected function setEntities(): array
    {
        return [
            'files' => [PassportFile::class],
            'front_side' => PassportFile::class,
            'reverse_side' => PassportFile::class,
            'selfie' => PassportFile::class,
            'translation' => [PassportFile::class],
        ];
    }
}
