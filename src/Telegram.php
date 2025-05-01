<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Entities\Update;
use Al3x5\xBot\Exceptions\xBotException;
use Al3x5\xBot\TelegramMethod as Method;

/**
 * Telegram class
 */
class Telegram
{
    private ?object $client = null;
    private ?object $response = null;

    public function __construct(private string $method, private array $params)
    {

        if (!Method::tryFrom($method)) {
            throw new xBotException("Method '$method' not found");
        }

        $this->client = Config::get('client');

        $params['parse_mode'] = 'HTML';

        $this->method = $method;
        $this->params = $params;
    }

    public function __toString()
    {
        $body = json_decode($this->response->getBody(), true);

        if (in_array($this->method, ['getMe', 'getWebhookInfo'])) {

            $output = '';

            foreach ($body['result'] as $key => $value) {
                $output .= "$key: $value" . PHP_EOL;
            }

            return $output;
        }

        if (in_array($this->method, ['setWebhook', 'deleteWebhook'])) {
            return $body['description'] . PHP_EOL;
        }
    }

    /**
     * Envia el metodo
     */
    public function send(): mixed
    {
        try {
            $this->response = $this->client->post(
                Config::get('webhook') . $this->method,
                [
                    'form_params' => $this->params
                ]
            );

            if ($this->response->getStatusCode() !== 200) {
                throw new xBotException("Server response error: " . $this->response->getStatusCode());
            }
            return $this->response();
        } catch (\ErrorException $e) {
            Events::logger(
                'TelegramApi',
                date('Ymd') . '.log',
                $e->getMessage() . '' . $e->getTraceAsString(),
                ['code' => $e->getCode()],
                'warning'
            );
            //return null;
            throw new xBotException("Failed to send Telegram request: " . $e->getMessage());
        }
    }

    /**
     * Obtener respuesta
     */
    public function response(): mixed
    {
        $data = json_decode($this->response->getBody(), true);
        $method=Method::from($this->method);

        if (!$data['ok']) {
            throw new \RuntimeException("Error: " . $data['description']);
        }

        $result = $data['result'];

        // Si es una colección, mapear cada elemento a la entidad correspondiente
        if ($method->isCollection()) {
            $entityClass = $method->getEntityClass();
            return array_map(fn($item) => new $entityClass($item), $result);
        }

        // Si es un tipo primitivo, devolver el valor directamente
        if ($method->isPrimitive()) {
            return $result;
        }

        // Si es una entidad, devolver una instancia de la clase correspondiente
        return new ($method->getEntityClass())($result);
    }
}
