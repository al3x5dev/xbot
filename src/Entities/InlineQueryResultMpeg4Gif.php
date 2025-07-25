<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InlineQueryResultMpeg4Gif Entity
 * @property string $type
 * @property string $id
 * @property string $mpeg4_url
 * @property int $mpeg4_width
 * @property int $mpeg4_height
 * @property int $mpeg4_duration
 * @property string $thumbnail_url
 * @property string $thumbnail_mime_type
 * @property string $title
 * @property string $caption
 * @property string $parse_mode
 * @property MessageEntity[] $caption_entities
 * @property bool $show_caption_above_media
 * @property InlineKeyboardMarkup $reply_markup
 * @property InputMessageContent $input_message_content
 */
class InlineQueryResultMpeg4Gif extends Entity
{
    protected function setEntities(): array
    {
        return [
            'caption_entities' => [MessageEntity::class],
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
