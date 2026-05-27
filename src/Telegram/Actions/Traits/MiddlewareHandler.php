<?php

namespace Al3x5\xBot\Telegram\Actions\Traits;

use Al3x5\xBot\Telegram\Actions\Middlewares;

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

    private function getMiddlewareFor(string $type, ?string $command = null): array
    {
        $middlewares = [];

        if (isset($this->middlewares['global'])) {
            $middlewares = array_merge($middlewares, $this->middlewares['global']);
        }

        if (isset($this->middlewares['types'][$type])) {
            $middlewares = array_merge(
                $middlewares,
                $this->middlewares['types'][$type]
            );
        }

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

    private function executePipeline(array $middlewares, callable $handler): void
    {
        if (empty($middlewares)) {
            $handler();
            return;
        }

        $pipeline = function () use ($handler) {
            return $handler();
        };

        foreach (array_reverse($middlewares) as $class) {
            $pipeline = function () use ($class, $pipeline) {

                classValidator($class, Middlewares::class, 'Middleware');

                $middleware = new $class($this->update);

                $result = $middleware->handle($pipeline);

                if ($result === false || is_null($result)) {
                    return false;
                }

                return $result;
            };
        }

        $pipeline();
    }
}
