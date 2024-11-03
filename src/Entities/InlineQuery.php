<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineQuery class
 */
class InlineQuery extends Base
{
    public function getEntities(): array
    {
        return [
            'from' => User::class
        ];
    }
}
