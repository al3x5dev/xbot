<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultVideo Entity
 * @property string $type;
 * @property string $id;
 * @property string $video_url;
 * @property string $mime_type;
 * @property string $thumbnail_url;
 * @property string $title;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property bool $show_caption_above_media;
 * @property int $video_width;
 * @property int $video_height;
 * @property int $video_duration;
 * @property string $description;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property InputMessageContent $input_message_content;
 */
class InlineQueryResultVideo extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
