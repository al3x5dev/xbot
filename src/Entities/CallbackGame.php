<?php

namespace Al3x5\xBot\Entities;

/**
 * CallbackGame class
 * 
 * @property string $user_id;
 * @property int $score;
 * @property bool $force;
 * @property bool $disable_edit_message;
 * @property int $chat_id;
 * @property int $message_id;
 * @property string $inline_message_id;
 */
class CallbackGame extends Base
{
    public function getEntities(): array
    {
        return [];
    }
}