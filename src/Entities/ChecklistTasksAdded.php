<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * ChecklistTasksAdded Entity
 * @property Message $checklist_message
 * @property ChecklistTask[] $tasks
 */
class ChecklistTasksAdded extends Entity
{
    protected function setEntities(): array
    {
        return [
            'checklist_message' => Message::class,
            'tasks' => [ChecklistTask::class],
        ];
    }
}
