<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineKeyboardButton class
 * 
 * @property string $text;
 * @property string $url;
 * @property string $callback_data;
 * @property WebAppInfo $web_app;
 * @property LoginUrl $login_url;
 * @property string $switch_inline_query;
 * @property string $switch_inline_query_current_chat;
 * @property CallbackGame $callback_game;
 * @property bool $pay;
 */
class InlineKeyboardButton extends Base
{
    public function getEntities(): array
    {
        return [
            'web_app' => WebAppInfo::class,
            'login_url' => LoginUrl::class,
            'callback_game' => CallbackGame::class,
        ];
    }
}