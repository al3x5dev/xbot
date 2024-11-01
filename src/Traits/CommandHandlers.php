<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Entities\Message;
use Al3x5\xBot\Exceptions\xBotException;
use Al3x5\xBot\Keyboard;
use Al3x5\xBot\Telegram;

trait CommandHandlers
{
    private array $commands = [];

    /**
     * Establece array de comandos a ejecutar
     */
    public function addCommands(array $commands): self
    {
        foreach ($commands as $key => $value) {
            if ($this->hasCommand($key)) {
                throw new xBotException('Exist');
            }
            $this->commands = array_merge($this->commands, [$key => $value]);
        }
        return $this;
    }

    private function hasCommand(string $name): bool
    {
        return key_exists($name, $this->commands);
    }

    private function handleCommand(Message $message): Telegram
    {
        $key = rtrim($message->get('text'), '/');

        if (!$this->hasCommand($key)) {
            return $this->sendPhoto([
                'chat_id' => $this->getChatId(),
                'photo' => 'https://plus.unsplash.com/premium_photo-1677094310919-d0361465d3be?q=80&w=1632&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D', // Puede ser un file_id, una URL o un archivo local
                'caption' => 'Mensaje de ayuda ya que no se que comando estas precionando',

                'reply_markup' => Keyboard::inline([
                    [
                        ['text' => 'Hello', 'callback_data' => 'hello'],
                        ['text' => 'World', 'callback_data' => 'world']
                    ],
                    [
                        ['text' => 'Hello', 'callback_data' => 'hello'],
                        ['text' => 'World', 'callback_data' => 'world']
                    ],
                    [
                        ['text' => 'Hello', 'callback_data' => 'hello'],
                        ['text' => 'World', 'callback_data' => 'world']
                    ],
                    [
                        ['text' => 'Hello', 'callback_data' => 'hello'],
                        ['text' => 'World', 'callback_data' => 'world']
                    ],
                    [
                        ['text' => 'Hello', 'callback_data' => 'hello']
                    ]
                ])

            ]);
        }

        $cmd = $this->commands[$key];
        return (new $cmd($this, $message))->execute();
    }

    private function handleGenericMessage(Message $message): Telegram
    {
        if ($this->isTalking()) {
            return $this->getConversation();
        }

        return $this->reply('Mensaje generico');
    }

    public function executeCommand(string $command): Telegram
    {
        return (
            new $this->commands[$command](
                $this,
                $this->update->get('message')
            )
        )->execute();
    }
}
