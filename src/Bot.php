<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Exceptions\ExceptionHandler;
use Al3x5\xBot\Exceptions\xBotException;
use Al3x5\xBot\Traits\CallbackHandler;
use Al3x5\xBot\Traits\MessageHandler;
use Al3x5\xBot\Traits\MiddlewareHandler;
use Al3x5\xBot\Traits\BotActions;
use Mk4U\Http\Request;

class Bot
{
    public const NAME = 'xBot';

    public const VERSION = '3.0.1';

    public ?Update $update = null;

    use CallbackHandler,
        MessageHandler,
        MiddlewareHandler,
        BotActions;

    /**
     * Inicializa el bot
     */
    public function __construct(array $config = [])
    {
        ExceptionHandler::start();
        Config::init($config ?: xConfig());
        //
        $this->setMiddleware(base('bot/middleware.php'));
        $this->setCommands(base('storage/commands.json'));
        $this->setCallbacks(base('storage/callbacks.json'));
    }

    private function getUpdate(): void
    {
        $data = (Request::create())->jsonData(true);

        if (empty($data)) {
            throw new xBotException("Update empty! The webhook should not be called manually, only by Telegram.");
        }
        $this->update = new Update($data);
    }

    /**
     * Obtener tipo de manejador para la actualizacion entrante
     */
    private function getHandler(string $type): callable
    {
        return match ($type) {
            'message' => function () {
                $this->resolveMessage();
            },
            'callback_query' => function () {
                $this->resolveCallback();
            },
            default => function () use ($type) {
                $this->resolveHandler($type);
            }
        };
    }

    /**
     * Obtiene el objeto Update de Telegram y procesa los mensajes
     */
    public function run(): void
    {
        $this->getUpdate();
        $type = $this->update->type();

        if ($type === null) {
            throw new xBotException("Received update with unknown type: " . json_encode($this->update->getProperties()));
        }

        // Determinar si es un comando y extraer el nombre del comando
        $command = null;
        if ($type === 'message' && $this->update->getMessage()->isCommand()) {
            preg_match(
                '/^\/([a-zA-Z0-9_]+)/',
                $this->update->getMessage()->getText(),
                $matches
            );
            //$command = substr($matches[1],0,1) ?? null;
            $command = $matches[1] ?? null;
        }

        // Obtener el handler final basado en el tipo
        $handler = $this->getHandler($type);

        // Obtener los middleware para este tipo y comando
        $middlewares = $this->getMiddlewareFor($type, $command);

        // Ejecutar el pipeline
        $this->executePipeline($middlewares, $handler);
    }

    /**
     * Resuelve mensaje
     */
    private function resolveMessage(): void
    {
        if ($this->isTalking()) {
            $this->getConversation();
            return;
        }

        if ($this->update->getMessage()->isCommand()) {
            $this->handleCommand();
            return;
        }
        //mensage generico 
        $this->handleMessage();
    }

    /**
     * Resuelve Callback Query
     */
    private function resolveCallback(): void
    {
        $this->handleCallback();
    }

    /**
     * Resolver Handlers 
     */
    private function resolveHandler(string $type): void
    {
        $handler = preg_replace_callback('/_([a-z])/', function ($match) {
            return strtoupper($match[1]);
        }, $type);

        $class = 'Bot\\Handlers\\' . ucfirst($handler);
        classValidator($class, Handlers::class, 'Handler');


        (new $class($this->update))->execute();
    }
}
