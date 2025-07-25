<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UniqueGiftBackdropColors Entity
 * @property int $center_color
 * @property int $edge_color
 * @property int $symbol_color
 * @property int $text_color
 */
class UniqueGiftBackdropColors extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
