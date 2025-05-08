<?php

namespace Al3x5\xBot\Entities;

/**
 * KeyboardButton Entity
 * @property string $text;
 * @property KeyboardButtonRequestUsers $request_users;
 * @property KeyboardButtonRequestChat $request_chat;
 * @property bool $request_contact;
 * @property bool $request_location;
 * @property KeyboardButtonPollType $request_poll;
 * @property WebAppInfo $web_app;
 */
class KeyboardButton extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'request_users' => KeyboardButtonRequestUsers::class,
            'request_chat' => KeyboardButtonRequestChat::class,
            'request_poll' => KeyboardButtonPollType::class,
            'web_app' => WebAppInfo::class,
        ];
    }
}
