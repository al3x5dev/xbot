<?php

namespace Al3x5\xBot\Entities;

/**
 * InputPollOption Entity
 * @property string $text;
 * @property string $text_parse_mode;
 * @property \MessageEntity[] $text_entities;
 */
class InputPollOption extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
