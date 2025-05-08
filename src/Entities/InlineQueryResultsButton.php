<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQueryResultsButton Entity
 * @property string $text;
 * @property WebAppInfo $web_app;
 * @property string $start_parameter;
 */
class InlineQueryResultsButton extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'web_app' => WebAppInfo::class,
        ];
    }
}
