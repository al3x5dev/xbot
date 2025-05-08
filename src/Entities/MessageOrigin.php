<?php

namespace Al3x5\xBot\Entities;

/**
 * MessageOrigin Entity
 */
class MessageOrigin extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): MessageOriginUser|MessageOriginHiddenUser|MessageOriginChat|MessageOriginChannel
    {
        if ($this->hasProperty('sender_user')) {
            return new MessageOriginUser($this->propertys);
        }
        if ($this->hasProperty('sender_user_name')) {
            return new MessageOriginHiddenUser($this->propertys);
        }
        if ($this->hasProperty('chat') && $this->hasProperty('message_id')) {
            return new MessageOriginChannel($this->propertys);
        }
        return new MessageOriginChat($this->propertys);
    }
}
