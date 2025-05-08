<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultCachedAudio Entity
 * @property string $type;
 * @property string $id;
 * @property string $audio_file_id;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property InputMessageContent $input_message_content;
 */
class InlineQueryResultCachedAudio extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
