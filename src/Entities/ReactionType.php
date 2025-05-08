<?php

namespace Al3x5\xBot\Entities;

/**
 * ReactionType Entity
 */
class ReactionType extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve() : ReactionTypeEmoji| ReactionTypeCustomEmoji|ReactionTypePaid
    {
        if ($this->hasProperty('emoji')) {
            return new ReactionTypeEmoji($this->propertys);
        }
        if($this->hasProperty('custom_emoji_id')){
            return new ReactionTypeCustomEmoji($this->propertys);
        }
        return new ReactionTypePaid($this->propertys);
    }
}
