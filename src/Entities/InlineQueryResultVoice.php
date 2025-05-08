<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultVoice Entity
 * @property string $type;
 * @property string $id;
 * @property string $voice_url;
 * @property string $title;
 * @property string $caption;
 * @property string $parse_mode;
 * @property \MessageEntity[] $caption_entities;
 * @property int $voice_duration;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property InputMessageContent $input_message_content;
 */
class InlineQueryResultVoice extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
