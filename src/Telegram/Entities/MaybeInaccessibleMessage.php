<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * MaybeInaccessibleMessage Entity
 */
class MaybeInaccessibleMessage extends Entity
{
    
    public const TYPE_MESSAGE = 'message';
    public const TYPE_INACCESSIBLE_MESSAGE = 'inaccessible_message';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return $this->hasProperty('from') 
            ? new Message($this->properties)
            : new InaccessibleMessage($this->properties);
    }

    /**
     * Factory: creates the correct subclass based on data
     *
     * @param array $data
     * @return Entity
     */
    public static function create(array $data): Entity
    {
        return isset($data['from']) 
            ? new Message($data)
            : new InaccessibleMessage($data);
    }

}
