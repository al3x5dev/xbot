<?php

namespace Al3x5\xBot\Telegram\Actions;

use Al3x5\xBot\Telegram\Actions\Traits\MethodsHandler;
use Al3x5\xBot\Telegram\Entities\CallbackQuery;
use Al3x5\xBot\Telegram\Entities\InaccessibleMessage;
use Al3x5\xBot\Telegram\Entities\MaybeInaccessibleMessage;
use Al3x5\xBot\Telegram\Entities\Message;
use Al3x5\xBot\Telegram\Entities\Update;

abstract class Callbacks
{
    public ?CallbackQuery $callback;
    public ?MaybeInaccessibleMessage $message;
    protected ?string $callbackParam = null;


    use MethodsHandler;

    public function __construct(protected Update $update)
    {
        $this->callback = $update->getCallbackQuery();
        $this->message = $this->callback->getMessage();
    }

    abstract public function execute(): void;

    public function message(): Message|InaccessibleMessage
    {
        return $this->message->resolve();
    }

    public function setParam(?string $param): static
    {
        $this->callbackParam = $param;
        return $this;
    }

    public function getParam(): ?string
    {
        return $this->callbackParam;
    }
}
