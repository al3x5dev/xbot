<?php

namespace Al3x5\xBot\Entities;

/**
 * InaccessibleMessage class
 */
class InaccessibleMessage extends Base
{
    protected function getEntities() : array
    {
        return [
            'chat'=> Chat::class
        ];
    }
}
