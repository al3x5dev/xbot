<?php

namespace Al3x5\xBot\Entities;

/**
 * CallbackQuery Entity
 * @property string $id;
 * @property User $from;
 * @property MaybeInaccessibleMessage $message;
 * @property string $inline_message_id;
 * @property string $chat_instance;
 * @property string $data;
 * @property string $game_short_name;
 */
class CallbackQuery extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'from' => User::class,
            'message' => MaybeInaccessibleMessage::class,
        ];
    }
}
