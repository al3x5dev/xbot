<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultAudio Entity
 * @property string $type;
 * @property string $id;
 * @property string $audio_url;
 * @property string $title;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property string $performer;
 * @property int $audio_duration;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property InputMessageContent $input_message_content;
 */
class InlineQueryResultAudio extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
