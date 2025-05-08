<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultCachedPhoto Entity
 * @property string $type;
 * @property string $id;
 * @property string $photo_file_id;
 * @property string $title;
 * @property string $description;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property bool $show_caption_above_media;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property InputMessageContent $input_message_content;
 */
class InlineQueryResultCachedPhoto extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
