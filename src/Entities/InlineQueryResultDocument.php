<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InlineQueryResultDocument Entity
 * @property string $type
 * @property string $id
 * @property string $title
 * @property string $caption
 * @property string $parse_mode
 * @property MessageEntity[] $caption_entities
 * @property string $document_url
 * @property string $mime_type
 * @property string $description
 * @property InlineKeyboardMarkup $reply_markup
 * @property InputMessageContent $input_message_content
 * @property string $thumbnail_url
 * @property int $thumbnail_width
 * @property int $thumbnail_height
 */
class InlineQueryResultDocument extends Entity
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
