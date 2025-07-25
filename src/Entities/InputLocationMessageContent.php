<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputLocationMessageContent Entity
 * @property float $latitude
 * @property float $longitude
 * @property float $horizontal_accuracy
 * @property int $live_period
 * @property int $heading
 * @property int $proximity_alert_radius
 */
class InputLocationMessageContent extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
