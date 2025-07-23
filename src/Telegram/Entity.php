<?php

namespace Al3x5\xBot\Telegram;

/**
 * Entity Base Class
 */
abstract class Entity implements \JsonSerializable
{
    protected array $entityMap = [];

    protected array $properties = [];

    public function __construct(array $data)
    {
        $this->entityMap = $this->setEntities();

        $this->resolveEntity($data);
    }

    /**
     * Resuelve las entidades y propiedades devueltas en la api de telegram
     */
    protected function resolveEntity(array $data): void
    {
        foreach ($data as $key => $value) {
            if (isset($this->entityMap[$key])) {
                $entityClass = $this->entityMap[$key];

                // Caso: Array de entidades (ej: 'photo' => [PhotoSize::class])
                if (is_array($entityClass) && is_array($value)) {
                    $this->properties[$key] = array_map(
                        fn($item) => new $entityClass[0]($item),
                        $value
                    );
                }
                // Caso: Entidad individual
                elseif (is_array($value)) {
                    $this->properties[$key] = $this->createEntity($entityClass, $value);
                }
            }
            // Propiedad no mapeada
            else {
                $this->__set($key, $value);
            }
        }
    }


    /**
     * Instancia entidades hijas
     */
    protected function createEntity(string $class, array $params): Entity
    {
        if (!class_exists($class)) {
            throw new \RuntimeException("Class {$class} not found");
        }
        return new $class($params);
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
     * Obtiene todas las propiedades dinamicas
     */
    public function getProperties(): array
    {
        return $this->properties ?? [];
    }

    /**
     * Verificar propiedades existentes
     */
    public function __isset(string $name): bool
    {
        return $this->hasProperty($name);
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
            if ($this->hasProperty($propertyName)) {
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

    /**
     * Serializa propiedades
     */
    public function jsonSerialize(): array
    {
        return $this->properties;
    }

    /**
     * Convierte en json
     */
    public function toJson(): string
    {
        return json_encode($this);
    }

    /**
     * Imprime objeto
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * Debuguear entidad
     */
    public function __debugInfo(): array
    {
        return $this->properties;
    }
}
