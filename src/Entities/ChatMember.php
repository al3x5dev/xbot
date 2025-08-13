<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatMember Entity
 */
class ChatMember extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }

    public function resolve(): Entity
    {
        return match($this->status) {
            'creator' => new ChatMemberOwner($this->properties),
            'administrator' => new ChatMemberAdministrator($this->properties),
            'member' => new ChatMemberMember($this->properties),
            'restricted' => new ChatMemberRestricted($this->properties),
            'left' => new ChatMemberLeft($this->properties),
            'kicked' => new ChatMemberBanned($this->properties),
            default => throw new \InvalidArgumentException('Unknown ChatMember status: ' . $this->status),
        };
    }
}
