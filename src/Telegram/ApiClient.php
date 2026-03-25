<?php

namespace Al3x5\xBot\Telegram;

use Al3x5\xBot\Config;
use Al3x5\xBot\Events;
use Al3x5\xBot\Exceptions\xBotException;
use Al3x5\xBot\Telegram\Entities\InputFile;

/**
 * ApiClient class
 * 
 * Maneja la comunicación con la API de Telegram Bot.
 * 
 * Funcionalidades:
 * - Envío de requests a la API de Telegram
 * - Manejo de multipart para envío de archivos
 * - Mapeo automático de respuestas a entidades
 * - Manejo de errores con logging
 * - Cacheo de tipos de retorno para rendimiento
 * 
 * @see https://core.telegram.org/bots/api
 */
class ApiClient
{
    use Methods;

    /** @var array|null Cache estático para tipos de retorno de métodos */
    private static ?array $methodReturnTypes = null;

    /**
     * Constructor de ApiClient
     * 
     * @param string $method Nombre del método de la API de Telegram
     * @param array $params Parámetros para el método
     */
    public function __construct(private string $method, private array $params)
    {
        // Forzamos parse_mode a HTML por defecto, pero permitimos que el usuario lo sobrescriba
        // El array_merge asegura que los valores del usuario sobrescriban el parse_mode por defecto
        $this->params = array_merge(['parse_mode' => 'HTML'], $params);
        $this->method = $method;
    }

    /**
     * Envía la solicitud a Telegram
     * 
     * Detecta automáticamente si hay archivos en los parámetros
     * y usa el método apropiado (form_params o multipart).
     * 
     * @return mixed Respuesta de la API (entidad mapeada o array)
     * @throws xBotException Si la solicitud falla
     */
    public function send(): mixed
    {
        // 1. Detectar si hay algún objeto InputFile en los parámetros
        $hasFile = false;
        
        foreach ($this->params as $value) {
            if ($value instanceof InputFile) {
                $hasFile = true;
                break;
            }
        }

        try {
            // 2. Construir opciones según el tipo de contenido
            // Si hay archivos, usar multipart/form-data
            // De lo contrario, usar application/x-www-form-urlencoded
            $options = $hasFile
                ? ['multipart' => $this->buildMultipart()]
                : ['form_params' => $this->normalizeParams()];

            // 3. Ejecutar la petición usando el cliente HTTP configurado
            $response = Config::get('http_client')->post(
                Config::get('webhook') . $this->method,
                $options
            );

            // 4. Procesar y retornar la respuesta
            return $this->processResponse($response);

        } catch (\Exception $e) {
            // Loguear el error con el rastro completo para depuración técnica
            Events::logger(
                'TelegramApi',
                date('Ymd') . '.log',
                "Request Failed: " . $e->getMessage(),
                [
                    'method' => $this->method,
                    'params' => $this->params, // Cuidado con datos sensibles aquí
                    'trace'  => $e->getTraceAsString()
                ],
                'error'
            );
            throw new xBotException("API request failed: " . $e->getMessage(), $e->getCode());
        }
    }

    /**
     * Normaliza parámetros SIN archivos
     * 
     * Convierte arrays/objetos a JSON y filtra valores nulos.
     * Telegram rechaza campos con valor null.
     * 
     * @return array Parámetros normalizados
     */
    protected function normalizeParams(): array
    {
        $normalized = [];

        foreach ($this->params as $key => $value) {
            // Telegram rechaza campos con valor null, mejor no enviarlos
            if ($value === null) continue;

            // Arrays y objetos se serializan a JSON
            // Usamos flags para evitar problemas con emojis y caracteres especiales
            if (is_array($value) || is_object($value)) {
                $normalized[$key] = json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            } else {
                $normalized[$key] = $value;
            }
        }

        return $normalized;
    }

    /**
     * Construye estructura multipart/form-data para peticiones con archivos
     * 
     * Telegram requiere multipart cuando se envían archivos.
     * InputFile se convierte al contenido del archivo.
     * Otros valores se convierten a string.
     * 
     * @return array Array de partes para multipart
     */
    protected function buildMultipart(): array
    {
        $multipart = [];

        foreach ($this->params as $name => $value) {
            if ($value === null) continue;

            // Si es un InputFile, extraer el contenido del archivo
            if ($value instanceof InputFile) {
                $multipart[] = [
                    'name'     => $name,
                    'contents' => $value->file // Mk4U\Http\Client lo convertirá a CURLFile
                ];
            } else {
                // Para campos que no son archivos en un multipart, Telegram espera strings.
                // Si es un array (como 'results' en inline queries), debe ser un string JSON.
                $contents = (is_array($value) || is_object($value))
                    ? json_encode($value, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
                    : (string)$value;

                $multipart[] = [
                    'name'     => $name,
                    'contents' => $contents
                ];
            }
        }

        return $multipart;
    }

    /**
     * Procesa la respuesta de la API
     * 
     * Maneja códigos de estado HTTP, verifica ok=true en respuesta,
     * y mapea el resultado a la entidad correspondiente según el tipo de retorno.
     * 
     * @param object $response Respuesta HTTP del cliente
     * @return mixed Entidad mapeada o array de datos
     * @throws xBotException Si la API retorna error
     */
    private function processResponse(object $response): mixed
    {
        $body = $response->getBody();
        $statusCode = $response->getStatusCode();

        // Si no es 200, Telegram devuelve un JSON explicando el error (ej. 400 Bad Request)
        if ($statusCode !== 200) {
            // LOG CRÍTICO: Aquí es donde verás por qué Telegram rechaza la petición
            Events::logger('TelegramError', 'api_errors.log', "HTTP $statusCode: $body", ['method' => $this->method]);
            throw new xBotException("Telegram API Error [$statusCode]: $body");
        }

        // Decodificar JSON
        $data = json_decode($body, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Invalid JSON response from Telegram: " . json_last_error_msg());
        }

        // Caso donde Telegram responde 200 pero ok es false (poco común, pero posible)
        if (!($data['ok'] ?? false)) {
            $desc = $data['description'] ?? 'Unknown error';
            throw new xBotException("Telegram API Error: $desc");
        }

        // Extraer resultado
        $result = $data['result'] ?? $data;

        // Si el resultado no es un array, retornarlo directamente
        // (algunos métodos devuelven valores simples como bool)
        if (!is_array($result)) {
            return $result;
        }

        // Intento de mapeo dinámico a Entidades basado en el tipo de retorno del método
        // Esto permite que getMe() retorne un User, sendMessage() retorne un Message, etc.
        $returnType = $this->getReturnTypeForMethod($this->method);
        if ($returnType && class_exists($returnType)) {
            return new $returnType($result);
        }

        // Si no hay mapeo, retornar el array raw
        return $result;
    }

    /**
     * Obtiene el tipo de retorno para un método específico
     * 
     * Usa cache estático para evitar escanear los tipos en cada request.
     * 
     * @param string $method Nombre del método
     * @return string|null Nombre de la clase de entidad o null
     */
    private function getReturnTypeForMethod(string $method): ?string
    {
        // Inicializar cache si no existe
        if (self::$methodReturnTypes === null) {
            self::$methodReturnTypes = $this->scanReturnTypes();
        }

        return self::$methodReturnTypes[$method] ?? null;
    }

    /**
     * Escanea los tipos de retorno de todos los métodos públicos de esta clase
     * 
     * Usa reflexión para obtener los tipos de retorno declarados
     * y construir un mapa de método => tipo de retorno.
     * 
     * @return array Mapa de [nombreMetodo => TipoRetorno::class]
     */
    private function scanReturnTypes(): array
    {
        $types = [];
        $reflection = new \ReflectionClass($this);
        
        // Obtener solo los métodos públicos definidos en esta clase (no los del trait)
        foreach ($reflection->getMethods(\ReflectionMethod::IS_PUBLIC) as $method) {
            // Saltar métodos heredados de traits
            if ($method->getDeclaringClass()->getName() !== self::class) {
                continue;
            }
            
            // Obtener tipo de retorno
            $returnType = $method->getReturnType();
            
            // Solo guardar tipos no built-in (clases)
            // ReflectionUnionType no tiene isBuiltin(), solo ReflectionNamedType
            if ($returnType instanceof \ReflectionNamedType && !$returnType->isBuiltin()) {
                $types[$method->getName()] = $returnType->getName();
            }
        }

        return $types;
    }
}
