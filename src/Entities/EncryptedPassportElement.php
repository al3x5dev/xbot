<?php

namespace Al3x5\xBot\Entities;

/**
 * EncryptedPassportElement Entity
 * @property string $type;
 * @property string $data;
 * @property string $phone_number;
 * @property string $email;
 * @property \PassportFile[] $files;
 * @property PassportFile $front_side;
 * @property PassportFile $reverse_side;
 * @property PassportFile $selfie;
 * @property \PassportFile[] $translation;
 * @property string $hash;
 */
class EncryptedPassportElement extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'front_side' => PassportFile::class,
            'reverse_side' => PassportFile::class,
            'selfie' => PassportFile::class,
        ];
    }
}
