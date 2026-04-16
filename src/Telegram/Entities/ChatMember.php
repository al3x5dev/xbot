<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChatMember Entity
 */
class ChatMember extends Entity
{
    
    public const STATUS_CREATOR = 'creator';
    public const STATUS_ADMINISTRATOR = 'administrator';
    public const STATUS_MEMBER = 'member';
    public const STATUS_RESTRICTED = 'restricted';
    public const STATUS_LEFT = 'left';
    public const STATUS_KICKED = 'kicked';

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

    /**
     * Factory: creates the correct subclass based on status
     *
     * @param array $data Must contain 'status' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['status'] ?? null) {
            self::STATUS_CREATOR => new ChatMemberOwner($data),
            self::STATUS_ADMINISTRATOR => new ChatMemberAdministrator($data),
            self::STATUS_MEMBER => new ChatMemberMember($data),
            self::STATUS_RESTRICTED => new ChatMemberRestricted($data),
            self::STATUS_LEFT => new ChatMemberLeft($data),
            self::STATUS_KICKED => new ChatMemberBanned($data),
            default => throw new \InvalidArgumentException('Unknown ChatMember status: ' . ($data['status'] ?? 'null')),
        };
    }

}
