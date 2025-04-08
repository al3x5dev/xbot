<?php

namespace Al3x5\xBot;

use Al3x5\xBot\Exceptions\xBotException;

/**
 * Config class
 */
class Config
{
    private static ?Config $init = null;
    private static array $cfg = [];


    private function __construct(array $cfg)
    {
        if (!isset($cfg['token'])) {
            throw new xBotException('Token not defined!');
        }

        self::$cfg = [
            'token' => self::validateToken($cfg['token']),
            'name' => $cfg['name'] ?? '',
            'admins' => $cfg['admins'] ?? [],
            //'async' => $cfg['async'] ?? false,
            'client' => $cfg['client'] ?? new \Mk4U\Http\Client(),
            'storage' => $cfg['storage'] ?? \Mk4U\Cache\CacheFactory::create('file', [
                'dir' => 'storage/cache',
                'ttl' => 600
            ]),
            'webhook' => $cfg['webhook'] ?? self::webhook($cfg['token']),
            'dev' => $cfg['dev'] ?? false,
            'abs_path' => $cfg['name'] ?? throw new xBotException('No absolute path has been defined'),
        ];
    }

    /**
     * Inicializacion
     */
    public static function init(array $cfg): self
    {
        if (is_null(self::$init)) {
            self::$init = new self($cfg);
        }
        return self::$init;
    }

    public static function has(string $name): bool
    {
        return isset(self::$cfg[$name]);
    }

    /**
     * Agrega un parametro de configuracion
     */
    public static function set(string $name, mixed $value): void
    {
        if (!self::has($name)) {
            self::$cfg[$name] = $value;
        }
        throw new xBotException("Parameter not found: $name");
    }

    /**
     * Obtiene un parametro de configuracion
     * 
     * En caso de no existir el parametro se devulve un valor por defecto
     */
    public static function get(string $name, mixed $default = null): mixed
    {
        return self::$cfg[$name] ?? $default;
    }

    /**
     * Valida el token del bot
     */
    private static function validateToken(string $token): string
    {
        if (!preg_match('/(\d+):[\w\-]+/', $token)) {
            throw new xBotException("Invalid Token!");
        }
        return $token;
    }

    /**
     * Devuelve url del webhook de Telegram Api
     */
    private static function webhook(string $token): string
    {
        return "https://api.telegram.org/bot$token/";
    }

    /**
     * Establece ruta absoluta para los logs
     */
    private static function logging(string $path = ''): string
    {
        return empty($path) ? dirname(__DIR__, 4) . '/' : rtrim($path, '/') . '/';
    }
}
