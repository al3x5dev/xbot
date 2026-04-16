<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * BackgroundFill Entity
 */
class BackgroundFill extends Entity
{
    
    public const TYPE_SOLID = 'solid';
    public const TYPE_GRADIENT = 'gradient';
    public const TYPE_FREEFORM_GRADIENT = 'freeform_gradient';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'solid' => new BackgroundFillSolid($this->properties),
            'gradient' => new BackgroundFillGradient($this->properties),
            'freeform_gradient' => new BackgroundFillFreeformGradient($this->properties),
            default => throw new \InvalidArgumentException('Unknown BackgroundFill type: ' . $this->type),
        };
    }

    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_SOLID => new BackgroundFillSolid($data),
            self::TYPE_GRADIENT => new BackgroundFillGradient($data),
            self::TYPE_FREEFORM_GRADIENT => new BackgroundFillFreeformGradient($data),
            default => throw new \InvalidArgumentException('Unknown BackgroundFill type: ' . ($data['type'] ?? 'null')),
        };
    }

}
