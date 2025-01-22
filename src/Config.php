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
                'dir' => 'storage',
                'ttl' => 600
            ]),
            'webhook' => $cfg['webhook'] ?? self::webhook($cfg['token']),
            'handler' => $cfg['handler'] ?? [],
            'dev' => $cfg['dev'] ?? false,
            'logs' => self::logging($cfg['logs'] ?? ''),
            'parse_mode' => $cfg['parse_mode'] ?? 'MarkdownV2'
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
        return isset(self::$cfg);
    }

    /**
     * Agrega un parametro de configuracion
     */
    public static function set(string $name, mixed $value): void
    {
        if (self::has($name)) {
            self::$cfg[$name] = $value;
        }
        throw new \InvalidArgumentException("Parameter not found: $name");
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

    private static function logging(string $path = ''): string
    {
        return empty($path) ? dirname(__DIR__, 4) . '/' : rtrim($path, '/') . '/';
    }
}
