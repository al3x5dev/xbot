<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlockVoiceNote Entity
 * @property string $type
 * @property InputMediaVoiceNote $voice_note
 * @property RichBlockCaption $caption
 */
class InputRichBlockVoiceNote extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'voice_note' => InputMediaVoiceNote::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
