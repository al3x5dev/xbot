<?php

namespace Al3x5\xBot\Entities;

/**
 * InputStoryContent Entity
 */
class InputStoryContent extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }

    public function resolve(): InputStoryContentPhoto|InputStoryContentVideo
    {
        return $this->hasProperty('photo')
            ? new InputStoryContentPhoto($this->propertys)
            : new InputStoryContentVideo($this->propertys);
    }
}
