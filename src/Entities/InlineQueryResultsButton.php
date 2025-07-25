<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InlineQueryResultsButton Entity
 * @property string $text
 * @property WebAppInfo $web_app
 * @property string $start_parameter
 */
class InlineQueryResultsButton extends Entity
{
    protected function setEntities(): array
    {
        return [
            'web_app' => WebAppInfo::class,
        ];
    }
}
