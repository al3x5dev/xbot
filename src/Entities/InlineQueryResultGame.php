<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultGame Entity
 * @property string $type;
 * @property string $id;
 * @property string $game_short_name;
 * @property InlineKeyboardMarkup $reply_markup;
 */
class InlineQueryResultGame extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
        ];
    }
}
