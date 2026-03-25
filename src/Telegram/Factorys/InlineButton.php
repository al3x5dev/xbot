<?php

namespace Al3x5\xBot\Telegram\Factorys;

use Al3x5\xBot\Telegram\Entities\CallbackGame;
use Al3x5\xBot\Telegram\Entities\CopyTextButton;
use Al3x5\xBot\Telegram\Entities\InlineKeyboardButton;
use Al3x5\xBot\Telegram\Entities\LoginUrl;
use Al3x5\xBot\Telegram\Entities\SwitchInlineQueryChosenChat;
use Al3x5\xBot\Telegram\Entities\WebAppInfo;
use Al3x5\xBot\Telegram\Factorys\Keyboard\ButtonInterface;

class InlineButton implements ButtonInterface
{
    private ?string $text;
    private array $options = [];

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public static function make(string $text): static
    {
        return new static($text);
    }

    public function url(string $url): self
    {
        $this->options['url'] = $url;
        return $this;
    }

    public function callback(string $data): self
    {
        $this->options['callback_data'] = $data;
        return $this;
    }

    public function webApp(WebAppInfo $webAppInfo): self
    {
        $this->options['web_app'] = $webAppInfo;
        return $this;
    }

    public function loginUrl(LoginUrl $loginUrl): self
    {
        $this->options['login_url'] = $loginUrl;
        return $this;
    }

    public function switchInlineQuery(string $query): self
    {
        $this->options['switch_inline_query'] = $query;
        return $this;
    }

    public function switchInlineQueryCurrentChat(string $query): self
    {
        $this->options['switch_inline_query_current_chat'] = $query;
        return $this;
    }

    public function switchInlineQueryChosenChat(SwitchInlineQueryChosenChat $chosenChat): self
    {
        $this->options['switch_inline_query_chosen_chat'] = $chosenChat;
        return $this;
    }

    public function copyText(CopyTextButton $copyText): self
    {
        $this->options['copy_text'] = $copyText;
        return $this;
    }

    public function callbackGame(CallbackGame $callbackGame): self
    {
        $this->options['callback_game'] = $callbackGame;
        return $this;
    }

    public function pay(bool $value = true): self
    {
        $this->options['pay'] = $value;
        return $this;
    }

    public function build(): InlineKeyboardButton
    {
        $data = ['text' => $this->text] + $this->options;
        return new InlineKeyboardButton($data);
    }
}
