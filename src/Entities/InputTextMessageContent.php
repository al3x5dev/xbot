<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputTextMessageContent Entity
 * @property string $message_text
 * @property string $parse_mode
 * @property MessageEntity[] $entities
 * @property LinkPreviewOptions $link_preview_options
 */
class InputTextMessageContent extends Entity
{
    protected function setEntities(): array
    {
        return [
            'entities' => [MessageEntity::class],
            'link_preview_options' => LinkPreviewOptions::class,
        ];
    }
}
