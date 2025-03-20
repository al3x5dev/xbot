<?php

namespace Al3x5\xBot\Entities;

/**
 * InputMessageContent class
 * 
 * @property string $message_text;
 * @property string $parse_mode;
 * @property bool $disable_web_page_preview;
 */
class InputMessageContent extends Base
{
    public function getEntities(): array
    {
        return [];
    }
}