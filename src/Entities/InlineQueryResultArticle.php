<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultArticle Entity
 * @property string $type;
 * @property string $id;
 * @property string $title;
 * @property InputMessageContent $input_message_content;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property string $url;
 * @property string $description;
 * @property string $thumbnail_url;
 * @property int $thumbnail_width;
 * @property int $thumbnail_height;
 */
class InlineQueryResultArticle extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'input_message_content' => InputMessageContent::class,
            'reply_markup' => InlineKeyboardMarkup::class,
        ];
    }
}
