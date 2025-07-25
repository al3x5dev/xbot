<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Invoice Entity
 * @property string $title
 * @property string $description
 * @property string $start_parameter
 * @property string $currency
 * @property int $total_amount
 */
class Invoice extends Entity
{
    protected function setEntities(): array
    {
        return [];
    }
}
