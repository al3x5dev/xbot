<?php

namespace Al3x5\xBot\Entities;

/**
 * ChatMember Entity
 */
class ChatMember extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): ChatMemberOwner|ChatMemberAdministrator|ChatMemberMember|ChatMemberRestricted|ChatMemberLeft|ChatMemberBanned
    {
        return match ($this->propertys['status']) {
            'creator' => new ChatMemberOwner($this->propertys),
            'administrator' => new ChatMemberAdministrator($this->propertys),
            'member' => new ChatMemberMember($this->propertys),
            'restricted' => new ChatMemberRestricted($this->propertys),
            'left' => new ChatMemberLeft($this->propertys),
            'kicked' => new ChatMemberBanned($this->propertys)
        };
    }
}
