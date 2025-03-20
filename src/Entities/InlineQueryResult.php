<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResult class
 * 
 * @property string $type;
 * @property string $id;
 * @property string $title;
 * @property InputMessageContent $input_message_content;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property string $url;
 * @property bool $hide_url;
 * @property string $description;
 * @property string $thumbnail_url;
 * @property int $thumbnail_width;
 * @property int $thumbnail_height;
 */
class InlineQueryResult extends Base
{
    public function getEntities(): array
    {
        return [
            'input_message_content' => InputMessageContent::class,
            'reply_markup' => InlineKeyboardMarkup::class,
        ];
    }
}