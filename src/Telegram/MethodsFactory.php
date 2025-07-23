<?php

namespace Al3x5\xBot\Telegram;

use Al3x5\xBot\Telegram\Api\MethodDefinition;
use Al3x5\xBot\Telegram\Api\ParameterDefinition;

/**
 * Telegram Methods Factory class
 */
class MethodsFactory
{
    private array $methods;

    public function __construct(string $json)
    {
        $this->methods = json_decode($json, true)['methods'];
    }

    /**
     * Obtiene la definición de un método por su nombre.
     */
    public function getMethod(string $methodName): MethodDefinition
    {
        if (!isset($this->methods[$methodName])) {
            throw new \InvalidArgumentException("Method not defined: $methodName");
        }

        $methodData = $this->methods[$methodName];
        $parameters = [];

        if (key_exists('parameters', $methodData)) {
            foreach ($methodData['parameters'] as $param => $value) {
                $parameters[] = new ParameterDefinition(
                    $param,
                    $this->parseTypes($value['type']),
                    $value['required'],
                );
            }
        }

        return new MethodDefinition(
            $methodName,
            $this->parseReturnType($methodData['returns'][0]),
            $parameters
        );
    }

    /**
     * Convierte tipos del JSON a tipos PHP/clases.
     */
    private function parseTypes(array $jsonTypes): array
    {
        return array_map(function ($type) {
            // Tipos primitivos
            $primitiveMap = [
                'String' => 'string',
                'Integer' => 'int',
                'Boolean' => 'bool',
                'Float' => 'float',
                'True' => 'bool',
                'False' => 'bool',
            ];

            // Tipos compuestos (ej: "Array<MessageEntity>")
            if (preg_match('/^Array<(.*)>$/', $type, $matches)) {
                $innerType = $matches[1];

                if (isset($primitiveMap[$innerType])) {
                    return 'array'; // o "array<{$primitiveMap[$innerType]}>" si deseas más precisión
                }

                $class = $this->resolveEntityClass($innerType);
                return "array<$class>";
            }

            // Entidades personalizadas (ej: "MessageEntity")
            if (!isset($primitiveMap[$type])) {
                return $this->resolveEntityClass($type);
            }

            return $primitiveMap[$type];
        }, $jsonTypes);
    }

    /**
     * Resuelve el nombre de una entidad a su clase.
     */
    private function resolveEntityClass(string $type): string
    {
        $className = "Al3x5\\xBot\\Entities\\$type";
        if (!class_exists($className)) {
            throw new \InvalidArgumentException("Class not found: $className");
        }
        return $className;
    }

    /**
     * Parsea el tipo de retorno.
     */
    private function parseReturnType(string $returnType): string
    {
        return $this->parseTypes([$returnType])[0];
    }
}
