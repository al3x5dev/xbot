<?php

namespace Al3x5\xBot\Telegram\Actions\Traits;

use Al3x5\xBot\Config;
use Al3x5\xBot\Telegram\Entities\CallbackQuery;
use Al3x5\xBot\Telegram\Entities\Message;
use Al3x5\xBot\Telegram\Methods;

trait MethodsHandler
{
    use Methods;

    protected static array $cachedCommands = [];

    public function reply(string $message, array $params = []): Message
    {
        if (!$active = $this->getActiveEntity()) {
            throw new \RuntimeException("No active entity found.");
        }

        $chat = match (true) {
            $active instanceof Message => $active->getChat(),
            $active instanceof CallbackQuery => $active->getMessage()->resolve()->getChat(),
            default => $active->getChat()
        };

        return $this->sender('sendMessage', array_merge([
            'chat_id' => $chat->getId(),
            'text' => $message,
        ], $params));
    }

    public function isAdmin(): bool
    {
        return in_array(
            $this->getActiveEntity()->getFrom()->getId() ?? null,
            Config::get('admins'),
            true
        );
    }

    public function getActiveEntity(): mixed
    {
        return $this->update->__get($this->update->type());
    }

    protected function getAllCommands(): array
    {
        if (empty(self::$cachedCommands)) {
            $json = json_decode(file_get_contents(base('storage/commands.json')), true);
            self::$cachedCommands = is_array($json) ? $json : throw new \RuntimeException("Error in commands.json: " . json_last_error_msg());
        }
        return self::$cachedCommands;
    }

    public function executeCommand(string $command, array $args = []): void
    {
        if (!key_exists($command, $this->getAllCommands())) {
            throw new \InvalidArgumentException("Error: Command '$command' does not exist.");
        }

        $cmd = new self::$cachedCommands[$command]($this->update);
        if (!empty($args)) $cmd->setArgs($args);
        $cmd->execute();
    }
}
