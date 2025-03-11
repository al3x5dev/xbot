<?php

namespace Al3x5\xBot\Attributes;

use Attribute;

#[Attribute]
class Command
{
    public function __construct(private string $command) {}

    public function getName(): string
    {
        return $this->command;
    }
}
