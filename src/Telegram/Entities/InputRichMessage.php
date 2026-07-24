<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichMessage Entity
 * @property InputRichBlock[] $blocks
 * @property string $html
 * @property string $markdown
 * @property InputRichMessageMedia[] $media
 * @property bool $is_rtl
 * @property bool $skip_entity_detection
 */
class InputRichMessage extends Entity
{
    
    protected function setEntities(): array
    {
        return [
            'blocks' => [InputRichBlock::class],
            'media' => [InputRichMessageMedia::class],
        ];
    }
}
