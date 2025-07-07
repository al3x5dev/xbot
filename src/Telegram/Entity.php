<?php

namespace Al3x5\xBot\Telegram;

/**
 * Entity Base Class
 */
abstract class Entity
{
    protected array $entityMap = [];

    protected array $properties;

    public function __construct(array $data)
    {
        $this->entityMap = $this->children();

        $this->resolveEntity($data);
    }

    /**
     * Resuelve las entidades y propiedades devueltas en la api de telegram
     */
    protected function resolveEntity(array $data): void
    {
        foreach ($data as $key => $value) {
            if (key_exists($key, $this->entityMap)) {
                $entityClass = $this->entityMap[$key];
                if (is_array($entityClass) && is_array($value)) {
                    // Si es un array de entidades, crea un array de objetos
                    $this->__set($key, array_map(fn($item) => new $entityClass[0]($item), $value));
                } else {
                    // Si es una sola entidad, crea un objeto
                    $this->__set($key, $this->createEntity($key, $value));
                }
            } else {
                if (is_array($value)) {
                    $this->resolveEntity($value);
                } else {
                    $this->__set($key, $value);
                }
            }
        }
    }

    /**
     * Instancia entidades hijas
     */
    protected function createEntity(string $class, array $params): Entity
    {
        return new $this->entityMap[$class]($params);
    }

    /**
     * Establece propiedades dinamicas
     */
    public function __set(string $name, mixed $value): void
    {
        $this->properties[$name] = $value;
    }

    /**
     * Obtiene propiedades dinamicas
     */
    public function __get(string $name): mixed
    {
        return $this->properties[$name] ?? null;
    }

    /**
     * Obtiene todas laspropiedades dinamicas
     */
    public function getProperties(): array
    {
        return $this->properties ?? [];
    }

    /**
     * Verificar si una propiedad existe.
     */
    public function hasProperty(string $name): bool
    {
        return isset($this->properties[$name]);
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
            if (isset($this->properties[$propertyName])) {
                return $this->properties[$propertyName];
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
    abstract protected function setEntities(): array;
}
