<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InlineQueryResultGame Entity
 * @property string $type
 * @property string $id
 * @property string $game_short_name
 * @property InlineKeyboardMarkup $reply_markup
 */
class InlineQueryResultGame extends Entity
{
    protected function setEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
        ];
    }
}
