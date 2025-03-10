<?php

namespace Al3x5\xBot\Entities;

/**
 * Chat class
 * 
 * @property public int $id
 * @property public string $type
 * @property public string $title
 * @property public string $username
 * @property public string $first_name
 * @property public string $last_name
 * @property public bool $is_forum
 */
class Chat extends Base
{
    public function getEntities(): array
    {
        return [];
    }
}
