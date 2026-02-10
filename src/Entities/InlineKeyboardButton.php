<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InlineKeyboardButton Entity
 * @property string $text
 * @property string $icon_custom_emoji_id
 * @property string $style
 * @property string $url
 * @property string $callback_data
 * @property WebAppInfo $web_app
 * @property LoginUrl $login_url
 * @property string $switch_inline_query
 * @property string $switch_inline_query_current_chat
 * @property SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat
 * @property CopyTextButton $copy_text
 * @property CallbackGame $callback_game
 * @property bool $pay
 */
class InlineKeyboardButton extends Entity
{
    protected function setEntities(): array
    {
        return [
            'web_app' => WebAppInfo::class,
            'login_url' => LoginUrl::class,
            'switch_inline_query_chosen_chat' => SwitchInlineQueryChosenChat::class,
            'copy_text' => CopyTextButton::class,
            'callback_game' => CallbackGame::class,
        ];
    }
}
