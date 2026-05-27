<?php

namespace Al3x5\xBot\Telegram\Actions\Traits;

use Al3x5\xBot\Config;
use Al3x5\xBot\Telegram\Actions\Conversations;
use Al3x5\xBot\Exceptions\xBotException;

trait ConversationHandler
{
    use MethodsHandler;

    private function getConversationIdentifier(): string
    {
        $type = $this->update->type();

        if (is_null($type)) {
            throw new xBotException(sprintf('Unsupported update type: %s', $type));
        }

        $entity = match ($type) {
            'callback_query' => $this->update->__get($type)->getMessage(),
            'message' => $this->update->__get($type),
        };
        return "{$entity->getChat()->getId()}:{$entity->getFrom()->getId()}";
    }

    private function isTalking(): bool
    {
        return  Config::get('cache')->has(
            $this->getConversationIdentifier()
        );
    }

    protected function getData(?string $key = null, mixed $default = null): mixed
    {
        $data = Config::get('cache')->get($this->getConversationIdentifier(), []);

        if (!is_array($data)) {
            $data = [];
        }

        if ($key === null) {
            return $data;
        }

        return $data[$key] ?? $default;
    }

    private function getConversation(): void
    {
        $text = $this->update->getMessage()->getText();

        if (is_null($this->getData())) return;

        if (
            !empty($this->getData('end'))
            && in_array(mb_strtolower($text), $this->getData('end'), true)
        ) {
            $this->stopConversation();

            if ($this->update->getMessage()->isCommand()) {
                $this->executeCommand($this->update->getMessage()->getText());
            }

            return;
        }

        $class = $this->getData('conversation');

        classValidator(
            $class,
            Conversations::class,
            'Conversation'
        );

        $conversation = new $class($this->update);
        call_user_func([$conversation, $this->getData('step')]);
    }

    public function stopConversation(): void
    {
        Config::get('cache')->delete(
            $this->getConversationIdentifier()
        );
    }
}
