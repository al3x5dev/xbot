<?php

namespace Al3x5\xBot\Entities;

/**
 * Base Class
 */
abstract class Base
{
    protected array $entityMap = [];

    public function __construct(array $data)
    {
        $this->entityMap = $this->getEntities();

        $this->resolve($data);
    }

    /**
     * Resuelve las entidades y propiedades devueltas en la api de telegram
     */
    protected function resolve(array $data) : void
    {
        foreach ($data as $key => $value) {
            if (key_exists($key, $this->getEntities())) {
                $this->$key = $this->createEntity($key, $value);
            } else {
                if (is_array($value)) {
                    $this->resolve($value);
                } else {
                    $this->$key = $value;
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

    public function get(string $property): mixed
    {
        return $this->$property;
    }

    /**
     * Declarar Entidades Hijas
     */
    abstract protected function getEntities(): array;
}
