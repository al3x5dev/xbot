<?php

namespace Al3x5\xBot\Telegram;

use Al3x5\xBot\Config;
use Al3x5\xBot\Entities\InputFile;
use Al3x5\xBot\Events;
use Al3x5\xBot\Exceptions\xBotException;

/**
 * ApiClient class
 */
class ApiClient
{
    private static ?MethodsFactory $factory = null;

    public function __construct(private string $method, private array $params)
    {
        // Cargar .json e iniciar factory
        if (is_null(self::$factory)) {
            $jsonFile = file_exists(Config::get('abs_path') . '/api.json')
                ? Config::get('abs_path') . '/api.json'
                : Config::get('abs_path') . '/vendor/al3x5/xbot/api.json';

            $json = file_get_contents($jsonFile);

            self::$factory = new MethodsFactory($json);
        }

        //Obtener metodo y validar parametros
        $methodDefinition = self::$factory->getMethod($method);

        // Mergear parámetros del usuario + parse_mode
        $this->params = array_merge($params, ['parse_mode' => 'HTML']);
        $this->method = $methodDefinition->name;

        // Validar los parámetros mergeados (no sobrescribir)
        Parameter::validate($this->params, $methodDefinition);
    }

    /**
     * Envia solicitud
     */
    public function send(): mixed
    {
        $hasFile = false;
        // Detectar si hay InputFile
        foreach ($this->params as $value) {
            if ($value instanceof InputFile) {
                $hasFile = true;
                break;
            }
        }

        try {
            $options = $hasFile
                ? ['multipart' => $this->buildMultipart()]
                : ['form_params' => $this->normalizeParams()];

            $response = Config::get('http_client')->post(
                Config::get('webhook') . $this->method,
                $options
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
     * Normaliza parámetros SIN archivos (JSON, arrays, objetos)
     */
    protected function normalizeParams(): array
    {
        $params = [];

        foreach ($this->params as $key => $value) {
            if (is_array($value) || is_object($value)) {
                $params[$key] = json_encode($value);
            } else {
                $params[$key] = $value;
            }
        }

        return $params;
    }

    /**
     * Construye multipart/form-data para archivos
     */
    protected function buildMultipart(): array
    {
        $multipart = [];

        foreach ($this->params as $name => $value) {

            if ($value instanceof \Al3x5\xBot\Entities\InputFile) {
                $multipart[] = [
                    'name'     => $name,
                    'contents' => $value->file
                ];
            } else {
                $multipart[] = [
                    'name'     => $name,
                    'contents' => is_scalar($value) ? (string) $value : json_encode($value)
                ];
            }
        }

        return $multipart;
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

        if (in_array($this->method, ['deleteWebhook', 'setWebhook'])) {
            return $data['description'];
        }

        // Determinar tipo de respuesta usando el Factory
        $methodDefinition = self::$factory->getMethod($this->method);

        $entity = $methodDefinition->returnType;

        return new $entity($data);
    }
}
