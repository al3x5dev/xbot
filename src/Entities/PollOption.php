<?php

namespace Al3x5\xBot\Entities;

/**
 * PollOption Entity
 * @property string $text;
 * @property \MessageEntity[] $text_entities;
 * @property int $voter_count;
 */
class PollOption extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
