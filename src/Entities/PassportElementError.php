<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * PassportElementError Entity
 */
class PassportElementError extends Entity
{
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
}
