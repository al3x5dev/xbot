<?php

namespace Al3x5\xBot\Entities;

/**
 * Document Entity
 * @property string $file_id;
 * @property string $file_unique_id;
 * @property PhotoSize $thumbnail;
 * @property string $file_name;
 * @property string $mime_type;
 * @property int $file_size;
 */
class Document extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'thumbnail' => PhotoSize::class,
        ];
    }
}
