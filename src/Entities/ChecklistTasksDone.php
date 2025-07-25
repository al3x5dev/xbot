<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChecklistTasksDone Entity
 * @property Message $checklist_message
 * @property int $marked_as_done_task_ids
 * @property int $marked_as_not_done_task_ids
 */
class ChecklistTasksDone extends Entity
{
    protected function setEntities(): array
    {
        return [
            'checklist_message' => Message::class,
        ];
    }
}
