<?php

namespace Al3x5\xBot\Entities;

/**
 * Dice class
 * 
 * @property public string $emoji
 * @property public int $value
 */
class Dice extends Base
{
    public function getEntities(): array
    {
        return [];
    }
}