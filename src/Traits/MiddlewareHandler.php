<?php

namespace Al3x5\xBot\Traits;

use Al3x5\xBot\Middlewares;

/**
 * Middleware
 */
trait MiddlewareHandler
{
    private array $middlewares = [];

    private function setMiddleware(string $filename): void
    {
        if (!file_exists($filename)) {
            $this->middlewares = [];
            return;
        }

        $this->middlewares = require_once($filename);
    }

    /**
     * Normalizar a array
     */
    private function normalizeToArray($value): array
    {
        if (is_string($value)) {
            return [$value];
        }

        if (is_array($value)) {
            return $value;
        }

        return [];
    }

    /**
     * Obtener middleware por grupo
     */
    private function getMiddlewareFor(string $type, ?string $command = null): array
    {
        $middlewares = [];

        // Middleware globales
        if (isset($this->middlewares['global'])) {
            $middlewares = array_merge($middlewares, $this->middlewares['global']);
        }

        // Middleware por tipos
        if (isset($this->middlewares['types'][$type])) {
            $middlewares = array_merge(
                $middlewares,
                $this->middlewares['types'][$type]
            );
        }

        // Middleware por comando específico
        if (isset($this->middlewares['commands'][$command])) {
            $middlewares = array_merge(
                $middlewares,
                $this->normalizeToArray(
                    $this->middlewares['commands'][$command]
                )
            );
        }

        return $middlewares;
    }

    /**
     * Ejecuta middlewares
     */
    private function executePipeline(array $middlewares, callable $handler): void
    {
        // Si no hay middleware, ejecutar el handler directamente
        if (empty($middlewares)) {
            $handler();
            return;
        }

        // Construir el pipeline de adentro hacia afuera
        $pipeline = function () use ($handler) {
            return $handler();
        };

        foreach (array_reverse($middlewares) as $class) {
            $pipeline = function () use ($class, $pipeline) {

                classValidator($class, Middlewares::class, 'Middleware');

                $middleware = new $class($this->update);

                $result = $middleware->handle($pipeline);

                // Si retorna false, ABORTAR
                if ($result === false || is_null($result)) {
                    return false;
                }

                // Cualquier otro valor, continuar
                return $result;
            };
        }

        // Ejecutar el pipeline
        $pipeline();
    }
}
