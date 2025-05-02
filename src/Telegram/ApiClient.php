<?php

namespace Al3x5\xBot\Telegram;

use Al3x5\xBot\Config;
use Al3x5\xBot\Events;
use Al3x5\xBot\Exceptions\xBotException;

/**
 * ApiClient class
 */
class ApiClient
{
    private static ?TelegramFactory $factory = null;
    //private mixed $response = null;

    public function __construct(private string $method, private array $params)
    {
        // Cargar .json e iniciar factory
        if (is_null(self::$factory)) {
            $jsonFile = '/telegram_methods.json';

            $json = file_get_contents(
                file_exists(Config::get('abs_path') . "$jsonFile")
                    ? Config::get('abs_path') . $jsonFile
                    : Config::get('abs_path') . "/vendor/al3x5/xbot$jsonFile"
            );

            self::$factory = new TelegramFactory($json);
        }

        //Obtener metodo y validar parametros
        $methodDefinition = self::$factory->getMethod($method);

        // Mergear parámetros del usuario + parse_mode
        $this->params = array_merge($params, ['parse_mode' => 'HTML']);
        $this->method = $methodDefinition->name;

        // Validar los parámetros mergeados (no sobrescribir)
        Parameter::validate($this->params, $methodDefinition);
    }

    /*public function __toString()
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
    }*/

    /**
     * Envia solicitud
     */
    public function send(): mixed
    {
        try {
            $response = Config::get('client')->post(
                Config::get('webhook') . $this->method,
                [
                    'form_params' => $this->params
                ]
            );

            return $this->processResponse($response);
        } catch (\Exception $e) {
            Events::logger(
                'TelegramApi',
                date('Ymd') . '.log',
                $e->getMessage() . '' . $e->getTraceAsString(),
                [
                    ['method' => $this->method],
                    ['code' => $e->getCode()]
                ],
                'error'
            );
            throw new xBotException("API request failed: " . $e->getMessage());
        }
    }

    /**
     * Procesar respuesta
     */
    private function processResponse(object $response): mixed
    {
        if ($response->getStatusCode() !== 200) {
            throw new xBotException("HTTP Error: " . $response->getStatusCode());
        }

        // Decodificar JSON
        $data = json_decode($response->getBody(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Invalid JSON response");
        }

        if (!$data['ok']) {
            throw new xBotException("API Error: " . ($data['description'] ?? 'Unknown error'));
        }

        // Determinar tipo de respuesta usando el Factory
        $result = $data['result'];
        $methodDefinition = self::$factory->getMethod($this->method);

        return $methodDefinition->returnType;
        /*
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
        return new ($method->getEntityClass())($result);*/
    }
}
