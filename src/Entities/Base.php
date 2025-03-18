<?php

namespace Al3x5\xBot\Entities;

/**
 * Base Class
 */
abstract class Base
{
    protected array $entityMap = [];

    protected array $propertys;

    public function __construct(array $data)
    {
        $this->entityMap = $this->getEntities();

        $this->resolve($data);
    }

    /**
     * Resuelve las entidades y propiedades devueltas en la api de telegram
     */
    protected function resolve(array $data): void
    {
        foreach ($data as $key => $value) {
            if (key_exists($key, $this->getEntities())) {
                $entityClass = $this->getEntities()[$key];
                if (is_array($entityClass) && is_array($value)) {
                    // Si es un array de entidades, crea un array de objetos
                    $this->__set($key, array_map(fn($item) => new $entityClass[0]($item), $value));
                } else {
                    // Si es una sola entidad, crea un objeto
                    $this->__set($key, $this->createEntity($key, $value));
                }
            } else {
                if (is_array($value)) {
                    $this->resolve($value);
                } else {
                    $this->__set($key, $value);
                }
            }
        }
    }

    /**
     * Instancia entidades hijas
     */
    protected function createEntity(string $class, array $params): object
    {
        return new $this->entityMap[$class]($params);
    }

    /**
     * Establece propiedades dinamicas
     */
    public function __set(string $name, mixed $value): void
    {
        $this->propertys[$name] = $value;
    }

    /**
     * Obtiene propiedades dinamicas
     */
    public function __get(string $name): mixed
    {
        return $this->propertys[$name] ?? null;
    }

    /**
     * Verificar si una propiedad existe.
     */
    public function __isset(string $name): bool
    {
        return isset($this->propertys[$name]);
    }

    /**
     * Llamadas a métodos dinámicos (ej: getUpdateId()).
     */
    public function __call(string $name, array $arguments): mixed
    {
        // Verifica si el método empieza con "get"
        if (str_starts_with($name, 'get')) {
            // Convierte el nombre del método a snake_case (ej: getUpdateId → update_id)
            $propertyName = $this->camelToSnake(substr($name, 3));

            // Si la propiedad existe, devuélvela
            if (isset($this->propertys[$propertyName])) {
                return $this->propertys[$propertyName];
            }

            throw new \BadMethodCallException("The property '$propertyName' does not exist.");
        }

        throw new \BadMethodCallException("The method '$name' does not exist.");
    }

    /**
     * Convierte camelCase a snake_case.
     */
    private function camelToSnake(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    /**
     * Declarar Entidades Hijas
     */
    abstract protected function getEntities(): array;
}
