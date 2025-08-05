<?php

namespace Al3x5\xBot\Telegram\Keyboards\Builder;

use Al3x5\xBot\Entities\KeyboardButton;
use Al3x5\xBot\Entities\KeyboardButtonPollType;
use Al3x5\xBot\Entities\KeyboardButtonRequestChat;
use Al3x5\xBot\Entities\KeyboardButtonRequestUsers;
use Al3x5\xBot\Entities\WebAppInfo;

class ReplyButton
{
    private string $text;
    private array $options = [];

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function requestUsers(KeyboardButtonRequestUsers $request): self
    {
        $this->options['request_users'] = $request;
        return $this;
    }

    public function requestChat(KeyboardButtonRequestChat $request): self
    {
        $this->options['request_chat'] = $request;
        return $this;
    }

    public function requestContact(bool $value = true): self
    {
        $this->options['request_contact'] = $value;
        return $this;
    }

    public function requestLocation(bool $value = true): self
    {
        $this->options['request_location'] = $value;
        return $this;
    }

    public function requestPoll(KeyboardButtonPollType $pollType): self
    {
        $this->options['request_poll'] = $pollType;
        return $this;
    }

    public function webApp(WebAppInfo $webAppInfo): self
    {
        $this->options['web_app'] = $webAppInfo;
        return $this;
    }

    public function build(): KeyboardButton
    {
        $data = ['text' => $this->text] + $this->options;
        return new KeyboardButton($data);
    }
}
