<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultCachedSticker Entity
 * @property string $type;
 * @property string $id;
 * @property string $sticker_file_id;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property InputMessageContent $input_message_content;
 */
class InlineQueryResultCachedSticker extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
