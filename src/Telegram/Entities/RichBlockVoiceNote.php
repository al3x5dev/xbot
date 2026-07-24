<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlockVoiceNote Entity
 * @property string $type
 * @property Voice $voice_note
 * @property RichBlockCaption $caption
 */
class RichBlockVoiceNote extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'voice_note' => Voice::class,
            'caption' => RichBlockCaption::class,
        ];
    }
}
