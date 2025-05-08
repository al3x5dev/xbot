<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineKeyboardButton Entity
 * @property string $text;
 * @property string $url;
 * @property string $callback_data;
 * @property WebAppInfo $web_app;
 * @property LoginUrl $login_url;
 * @property string $switch_inline_query;
 * @property string $switch_inline_query_current_chat;
 * @property SwitchInlineQueryChosenChat $switch_inline_query_chosen_chat;
 * @property CopyTextButton $copy_text;
 * @property CallbackGame $callback_game;
 * @property bool $pay;
 */
class InlineKeyboardButton extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'web_app' => WebAppInfo::class,
            'login_url' => LoginUrl::class,
            'switch_inline_query_chosen_chat' => SwitchInlineQueryChosenChat::class,
            'copy_text' => CopyTextButton::class,
            'callback_game' => CallbackGame::class,
        ];
    }

    /**
     * Crea botones inline
     */
    public static function create(array $button): static
    {
        return new self($button);
    }

    public function jsonSerialize(): array
    {
        return array_filter(
            [
                'text' => $this->text,
                'url' => $this->url,
                'callback_data' => $this->callback_data,
                'web_app' => $this->web_app,
                'login_url' => $this->login_url,
                'switch_inline_query' => $this->switch_inline_query,
                'switch_inline_query_current_chat' => $this->switch_inline_query_current_chat,
                'switch_inline_query_chosen_chat' => $this->switch_inline_query_chosen_chat,
                'copy_text' => $this->copy_text,
                'callback_game' => $this->callback_game,
                'pay' => $this->pay,
            ],
            fn($value) => $value !== null
        );
    }
}
