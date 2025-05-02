<?php

namespace Al3x5\xBot\Telegram;

use Al3x5\xBot\Telegram\Api\MethodDefinition;

/**
 * Validador de parametros
 */
class Parameter
{
    public static function validate(array $params, MethodDefinition $method): void
    {
        foreach ($method->parameters as $paramDef) {
            $paramName = $paramDef->name;
            $value = $params[$paramName] ?? null;

            // Validar parámetros requeridos
            if ($paramDef->required && !array_key_exists($paramName, $params)) {
                throw new \InvalidArgumentException("Required parameter missing: $paramName");
            }

            // Validar tipos si el parámetro está presente
            if ($value !== null) {
                self::checkType($paramName, $value, $paramDef->types);
            }
        }
    }

    private static function checkType(string $paramName, mixed $value, array $allowedTypes): void
    {
        foreach ($allowedTypes as $type) {
            if (self::isTypeValid($value, $type)) {
                return;
            }
        }

        throw new \InvalidArgumentException("Invalid type for '$paramName'. Expected: " . implode('|', $allowedTypes));
    }

    private static function isTypeValid(mixed $value, string $type): bool
    {
        // Manejar arrays de entidades (ej: "array<Entities\MessageEntity>")
        if (str_starts_with($type, 'array<')) {
            $entityClass = substr($type, 6, -1);
            return is_array($value) && (count($value) === 0 || $value[0] instanceof $entityClass);
        }

        // Tipos primitivos
        return match ($type) {
            'string' => is_string($value),
            'int' => is_int($value),
            'bool' => is_bool($value),
            'float' => is_float($value),
            default => $value instanceof $type,
        };
    }
}