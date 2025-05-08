<?php

namespace Al3x5\xBot\Entities;

/**
 * Game Entity
 * @property string $title;
 * @property string $description;
 * @property \PhotoSize[] $photo;
 * @property string $text;
 * @property \MessageEntity[] $text_entities;
 * @property Animation $animation;
 */
class Game extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'animation' => Animation::class,
        ];
    }
}
