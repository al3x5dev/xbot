<?php

namespace Al3x5\xBot\Entities;

/**
 * LinkPreviewOptions Entity
 * @property bool $is_disabled;
 * @property string $url;
 * @property bool $prefer_small_media;
 * @property bool $prefer_large_media;
 * @property bool $show_above_text;
 */
class LinkPreviewOptions extends EntityBase
{
    protected function getEntities(): array
    {
        return [];
    }
}
