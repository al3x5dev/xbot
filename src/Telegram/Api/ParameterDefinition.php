<?php

namespace Al3x5\xBot\Telegram\Api;

class ParameterDefinition
{
    public function __construct(
        public readonly string $name,
        public readonly array $types, // Tipos PHP válidos (ej: "int", "string", "Entities\Message")
        public readonly bool $required,
        //public readonly string $description
    ) {}
}