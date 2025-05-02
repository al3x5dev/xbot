<?php

namespace Al3x5\xBot\Telegram\Api;

class MethodDefinition
{
    public function __construct(
        public readonly string $name,
        public readonly string $returnType,
        public readonly array $parameters // Array de ParameterDefinition
    ) {}
}