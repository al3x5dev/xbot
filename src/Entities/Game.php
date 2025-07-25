<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Game Entity
 * @property string $title
 * @property string $description
 * @property PhotoSize[] $photo
 * @property string $text
 * @property MessageEntity[] $text_entities
 * @property Animation $animation
 */
class Game extends Entity
{
    protected function setEntities(): array
    {
        return [
            'photo' => [PhotoSize::class],
            'text_entities' => [MessageEntity::class],
            'animation' => Animation::class,
        ];
    }
}
