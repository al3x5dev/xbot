<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultLocation Entity
 * @property string $type;
 * @property string $id;
 * @property float $latitude;
 * @property float $longitude;
 * @property string $title;
 * @property float $horizontal_accuracy;
 * @property int $live_period;
 * @property int $heading;
 * @property int $proximity_alert_radius;
 * @property InlineKeyboardMarkup $reply_markup;
 * @property InputMessageContent $input_message_content;
 * @property string $thumbnail_url;
 * @property int $thumbnail_width;
 * @property int $thumbnail_height;
 */
class InlineQueryResultLocation extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'reply_markup' => InlineKeyboardMarkup::class,
            'input_message_content' => InputMessageContent::class,
        ];
    }
}
