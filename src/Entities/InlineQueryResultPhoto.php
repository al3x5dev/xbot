<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultPhoto Entity
 * @property string $type;
 * @property string $id;
 * @property string $photo_url;
 * @property string $thumbnail_url;
 * @property int $photo_width;
 * @property int $photo_height;
 * @property string $title;
 * @property string $description;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property bool $show_caption_above_media;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property InputMessageContent $input_message_content;
 */
class InlineQueryResultPhoto extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
