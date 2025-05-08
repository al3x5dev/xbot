<?php

namespace Al3x5\xBot\Entities;

/**
 * Invoice Entity
 * @property string $title;
 * @property string $description;
 * @property string $start_parameter;
 * @property string $currency;
 * @property int $total_amount;
 */
class Invoice extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
