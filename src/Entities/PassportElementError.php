<?php

namespace Al3x5\xBot\Entities;

/**
 * PassportElementError Entity
 */
class PassportElementError extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): PassportElementErrorDataField|PassportElementErrorFrontSide|PassportElementErrorReverseSide|PassportElementErrorSelfie|PassportElementErrorFile|PassportElementErrorFiles|PassportElementErrorTranslationFile|PassportElementErrorTranslationFiles|PassportElementErrorUnspecified
    {
        return match ($this->propertys['source']) {
            'data' => new PassportElementErrorDataField($this->propertys),
            'front_side' => new PassportElementErrorFrontSide($this->propertys),
            'reverse_side' => new PassportElementErrorReverseSide($this->propertys),
            'selfie' => new PassportElementErrorSelfie($this->propertys),
            'file' => new PassportElementErrorFile($this->propertys),
            'files' => new PassportElementErrorFiles($this->propertys),
            'translation_file' => new PassportElementErrorTranslationFile($this->propertys),
            'translation_files' => new PassportElementErrorTranslationFiles($this->propertys),
            'unspecified' => new PassportElementErrorUnspecified($this->propertys),
        };
    }
}
