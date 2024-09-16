<?php

namespace Al3x5\xBot\Entities;

/**
 * CallbackQuery class
 */
class CallbackQuery extends Base
{
    public function getEntities(): array
    {
        return [
            'from' => User::class,
            'message' => Message::class,
        ];
    }
}
