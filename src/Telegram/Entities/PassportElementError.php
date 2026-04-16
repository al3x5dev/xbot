<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PassportElementError Entity
 */
class PassportElementError extends Entity
{
    
    public const SOURCE_DATA = 'data';
    public const SOURCE_FRONT_SIDE = 'front_side';
    public const SOURCE_REVERSE_SIDE = 'reverse_side';
    public const SOURCE_SELFIE = 'selfie';
    public const SOURCE_FILE = 'file';
    public const SOURCE_FILES = 'files';
    public const SOURCE_TRANSLATION_FILE = 'translation_file';
    public const SOURCE_TRANSLATION_FILES = 'translation_files';
    public const SOURCE_UNSPECIFIED = 'unspecified';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->source) {
            'data' => new PassportElementErrorDataField($this->properties),
            'front_side' => new PassportElementErrorFrontSide($this->properties),
            'reverse_side' => new PassportElementErrorReverseSide($this->properties),
            'selfie' => new PassportElementErrorSelfie($this->properties),
            'file' => new PassportElementErrorFile($this->properties),
            'files' => new PassportElementErrorFiles($this->properties),
            'translation_file' => new PassportElementErrorTranslationFile($this->properties),
            'translation_files' => new PassportElementErrorTranslationFiles($this->properties),
            'unspecified' => new PassportElementErrorUnspecified($this->properties),
            default => throw new \InvalidArgumentException('Unknown PassportElementError type: ' . $this->source),
        };
    }

    /**
     * Factory: creates the correct subclass based on source
     *
     * @param array $data Must contain 'source' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['source'] ?? null) {
            self::SOURCE_DATA => new PassportElementErrorDataField($data),
            self::SOURCE_FRONT_SIDE => new PassportElementErrorFrontSide($data),
            self::SOURCE_REVERSE_SIDE => new PassportElementErrorReverseSide($data),
            self::SOURCE_SELFIE => new PassportElementErrorSelfie($data),
            self::SOURCE_FILE => new PassportElementErrorFile($data),
            self::SOURCE_FILES => new PassportElementErrorFiles($data),
            self::SOURCE_TRANSLATION_FILE => new PassportElementErrorTranslationFile($data),
            self::SOURCE_TRANSLATION_FILES => new PassportElementErrorTranslationFiles($data),
            self::SOURCE_UNSPECIFIED => new PassportElementErrorUnspecified($data),
            default => throw new \InvalidArgumentException('Unknown PassportElementError source: ' . ($data['source'] ?? 'null')),
        };
    }

}
