<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultGif Entity
 * @property string $type;
 * @property string $id;
 * @property string $gif_url;
 * @property int $gif_width;
 * @property int $gif_height;
 * @property int $gif_duration;
 * @property string $thumbnail_url;
 * @property string $thumbnail_mime_type;
 * @property string $title;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property bool $show_caption_above_media;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property InputMessageContent $input_message_content;
 */
class InlineQueryResultGif extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
