<?php

namespace Al3x5\xBot\Entities;

/**
 * StarTransaction Entity
 * @property string $id;
 * @property int $amount;
 * @property int $nanostar_amount;
 * @property int $date;
 * @property TransactionPartner $source;
 * @property TransactionPartner $receiver;
 */
class StarTransaction extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'source' => TransactionPartner::class,
            'receiver' => TransactionPartner::class,
        ];
    }
}
