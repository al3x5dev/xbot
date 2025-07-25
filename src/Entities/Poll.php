<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Poll Entity
 * @property string $id
 * @property string $question
 * @property MessageEntity[] $question_entities
 * @property PollOption[] $options
 * @property int $total_voter_count
 * @property bool $is_closed
 * @property bool $is_anonymous
 * @property string $type
 * @property bool $allows_multiple_answers
 * @property int $correct_option_id
 * @property string $explanation
 * @property MessageEntity[] $explanation_entities
 * @property int $open_period
 * @property int $close_date
 */
class Poll extends Entity
{
    protected function setEntities(): array
    {
        return [
            'question_entities' => [MessageEntity::class],
            'options' => [PollOption::class],
            'explanation_entities' => [MessageEntity::class],
        ];
    }
}
