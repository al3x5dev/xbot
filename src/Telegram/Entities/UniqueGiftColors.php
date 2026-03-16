<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * UniqueGiftColors Entity
 * @property string $model_custom_emoji_id
 * @property string $symbol_custom_emoji_id
 * @property int $light_theme_main_color
 * @property array $light_theme_other_colors
 * @property int $dark_theme_main_color
 * @property array $dark_theme_other_colors
 */
class UniqueGiftColors extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
