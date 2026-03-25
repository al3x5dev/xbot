<?php

namespace Al3x5\xBot\Telegram;

/**
 * Entity Base Class
 * 
 * Clase base para todas las entidades de Telegram Bot API.
 * Proporciona un sistema de mapeo dinámico de propiedades y entidades anidadas.
 * 
 * Características:
 * - Mapeo automático de propiedades desde arrays
 * - Soporte para entidades anidadas (ej: Message dentro de Update)
 * - Magic getters para acceder a propiedades (getPropertyName)
 * - Serialización JSON automática
 * - Manejo graceful de propiedades desconocidas
 */
abstract class Entity implements \JsonSerializable
{
    /** @var array Mapa de entidades para mapeo automático */
    protected array $entityMap = [];
    
    /** @var array Almacena las propiedades de la entidad */
    protected array $properties = [];

    /**
     * Constructor principal
     * 
     * @param array $data Datos recibidos de la API de Telegram
     */
    public function __construct(array $data)
    {
        $this->entityMap = $this->setEntities();
        $this->resolveEntity($data);
    }

    /**
     * Resuelve las entidades y propiedades devueltas en la api de telegram
     * 
     * Itera sobre los datos recibidos y los mapea según el entityMap definido.
     * Si una clave existe en el mapa, crea la entidad correspondiente.
     * De lo contrario, almacena el valor directamente como propiedad.
     * 
     * @param array $data Datos crudos de la API
     */
    protected function resolveEntity(array $data): void
    {
        foreach ($data as $key => $value) {
            // Verificar si la clave tiene una entidad mapeada
            if (isset($this->entityMap[$key])) {
                $entityClass = $this->entityMap[$key];

                // Caso: Array de entidades (ej: 'photos' => [PhotoSize::class])
                if (is_array($entityClass) && is_array($value)) {
                    $this->properties[$key] = array_map(
                        fn($item) => new $entityClass[0]($item),
                        $value
                    );
                }
                // Caso: Entidad individual (objeto)
                elseif (is_array($value)) {
                    $this->properties[$key] = $this->createEntity($entityClass, $value);
                }
                // Caso: La clave está mapeada pero el valor no es un array (edge case)
                else {
                    $this->properties[$key] = $value;
                }
            }
            // Propiedad no mapeada - almacenar directamente
            else {
                $this->__set($key, $value);
            }
        }
    }

    /**
     * Instancia entidades hija
     * 
     * Crea una nueva instancia de la clase de entidad especificada.
     * Si la clase no existe, retorna un stdClass con los datos para evitar errores.
     * 
     * @param string $class Nombre completo de la clase de entidad
     * @param array $params Parámetros para la entidad
     * @return object Entidad instanciada o stdClass como fallback
     */
    protected function createEntity(string $class, array $params): object
    {
        if (!class_exists($class)) {
            // Fallback: crear stdClass si la clase no existe
            // Esto evita errores cuando hay entidades nuevas en la API que aún no tenemos mapeadas
            $obj = new \stdClass();
            foreach ($params as $key => $value) {
                $obj->$key = $value;
            }
            return $obj;
        }
        return new $class($params);
    }

    /**
     * Establece propiedades dinámicas
     * 
     * @param string $name Nombre de la propiedad
     * @param mixed $value Valor a asignar
     */
    public function __set(string $name, mixed $value): void
    {
        $this->properties[$name] = $value;
    }

    /**
     * Obtiene propiedades dinámicas
     * 
     * @param string $name Nombre de la propiedad
     * @return mixed Valor de la propiedad o null si no existe
     */
    public function __get(string $name): mixed
    {
        return $this->properties[$name] ?? null;
    }

    /**
     * Obtiene todas las propiedades dinámicas
     * 
     * @return array Propiedades de la entidad
     */
    public function getProperties(): array
    {
        return $this->properties ?? [];
    }

    /**
     * Verificar propiedades existentes
     * 
     * @param string $name Nombre de la propiedad
     * @return bool True si la propiedad existe
     */
    public function __isset(string $name): bool
    {
        return $this->hasProperty($name);
    }

    /**
     * Verificar si una propiedad existe
     * 
     * @param string $name Nombre de la propiedad
     * @return bool True si existe
     */
    public function hasProperty(string $name): bool
    {
        return isset($this->properties[$name]);
    }

    /**
     * Llamadas a métodos dinámicos (ej: getUpdateId(), getMessageId())
     * 
     * Permite acceder a propiedades usando getters mágicos.
     * Convierte camelCase a snake_case automáticamente.
     * 
     * @param string $name Nombre del método llamado
     * @param array $arguments Argumentos (no usados)
     * @return mixed Valor de la propiedad o null
     */
    public function __call(string $name, array $arguments): mixed
    {
        // Solo manejar métodos que empiezan con "get"
        if (str_starts_with($name, 'get')) {
            // Convertir camelCase a snake_case (getMessageId -> message_id)
            $propertyName = $this->camelToSnake(substr($name, 3));

            // Buscar propiedad en snake_case
            if ($this->hasProperty($propertyName)) {
                return $this->properties[$propertyName];
            }

            // Buscar propiedad en camelCase original
            if ($this->hasProperty($name)) {
                return $this->properties[$name];
            }

            // Retornar null si no existe (en lugar de lanzar excepción)
            return null;
        }

        return null;
    }

    /**
     * Convierte camelCase a snake_case
     * 
     * Ejemplo: getMessageId -> message_id
     * 
     * @param string $input String en camelCase
     * @return string String en snake_case
     */
    private function camelToSnake(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    /**
     * Declarar Entidades Hijas
     * 
     * Método abstracto que cada entidad debe implementar
     * para definir su mapa de entidades anidadas.
     * 
     * @return array Mapa de entidades [clave => ClaseEntity::class]
     */
    abstract protected function setEntities(): array;

    /**
     * Serializa propiedades para JSON
     * 
     * @return array Representación de la entidad como array
     */
    public function jsonSerialize(): array
    {
        return $this->properties;
    }

    /**
     * Convierte en json
     * 
     * @return string Representación JSON de la entidad
     */
    public function toJson(): string
    {
        return json_encode($this);
    }

    /**
     * Representación como string
     * 
     * @return string Representación JSON de la entidad
     */
    public function __toString(): string
    {
        return $this->toJson();
    }

    /**
     * Información de depuración
     * 
     * @return array Propiedades para var_dump() y debug
     */
    public function __debugInfo(): array
    {
        return $this->properties;
    }
}
