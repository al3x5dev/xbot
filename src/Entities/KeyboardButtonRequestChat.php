<?php

namespace Al3x5\xBot\Entities;

/**
 * KeyboardButtonRequestChat Entity
 * @property int $request_id;
 * @property bool $chat_is_channel;
 * @property bool $chat_is_forum;
 * @property bool $chat_has_username;
 * @property bool $chat_is_created;
 * @property ChatAdministratorRights $user_administrator_rights;
 * @property ChatAdministratorRights $bot_administrator_rights;
 * @property bool $bot_is_member;
 * @property bool $request_title;
 * @property bool $request_username;
 * @property bool $request_photo;
 */
class KeyboardButtonRequestChat extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'user_administrator_rights' => ChatAdministratorRights::class,
            'bot_administrator_rights' => ChatAdministratorRights::class,
        ];
    }
}
