<?php

namespace Al3x5\xBot\Attributes;

use Attribute;

#[Attribute]
class Callback
{
    public function __construct(private string $action) {}

    public function getName() : string
    {
        return $this->action;
    }
}
