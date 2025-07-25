<?php

namespace Al3x5\xBot\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * Checklist Entity
 * @property string $title
 * @property MessageEntity[] $title_entities
 * @property ChecklistTask[] $tasks
 * @property bool $others_can_add_tasks
 * @property bool $others_can_mark_tasks_as_done
 */
class Checklist extends Entity
{
    protected function setEntities(): array
    {
        return [
            'title_entities' => [MessageEntity::class],
            'tasks' => [ChecklistTask::class],
        ];
    }
}
