<?php

namespace Al3x5\xBot\Entities;

/**
 * InputTextMessageContent Entity
 * @property string $message_text;
 * @property string $parse_mode;
 * @property \MessageEntity[] $entities;
 * @property LinkPreviewOptions $link_preview_options;
 */
class InputTextMessageContent extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'entities' => [MessageEntity::class],
            'link_preview_options' => LinkPreviewOptions::class,
        ];
    }
}
