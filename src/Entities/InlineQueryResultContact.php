<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultContact Entity
 * @property string $type;
 * @property string $id;
 * @property string $phone_number;
 * @property string $first_name;
 * @property string $last_name;
 * @property string $vcard;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property InputMessageContent $input_message_content;
 * @property string $thumbnail_url;
 * @property int $thumbnail_width;
 * @property int $thumbnail_height;
 */
class InlineQueryResultContact extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
