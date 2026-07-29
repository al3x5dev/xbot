<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BackgroundTypeChatTheme Entity
 * @property string $type
 * @property string $theme_name
 */
class BackgroundTypeChatTheme extends BackgroundType
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
