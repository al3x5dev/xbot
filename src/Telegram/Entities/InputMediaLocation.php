<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputMediaLocation Entity
 * @property string $type
 * @property float $latitude
 * @property float $longitude
 * @property float $horizontal_accuracy
 */
class InputMediaLocation extends Entity
{
    
    protected function setEntities(): array
    {
        return [];
    }
}
