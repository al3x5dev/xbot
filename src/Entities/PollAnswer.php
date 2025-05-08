<?php

namespace Al3x5\xBot\Entities;

/**
 * PollAnswer Entity
 * @property string $poll_id;
 * @property Chat $voter_chat;
 * @property User $user;
 * @property \Integer[] $option_ids;
 */
class PollAnswer extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'voter_chat' => Chat::class,
            'user' => User::class,
        ];
    }
}
