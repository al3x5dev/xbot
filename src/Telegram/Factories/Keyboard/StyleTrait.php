<?php

namespace Al3x5\xBot\Telegram\Factories\Keyboard;

trait StyleTrait{

    public function emoji(?string $icon_custom = null): self
    {
        $this->options['icon_custom_emoji_id'] = $icon_custom;
        return $this;
    }

    /**
     *  Style of the button.
     * 
     * "danger" (red),
     * "success" (green)
     * "primary" (blue).
     * 
     * If omitted, then an app-specific style is used.
     */
    public function style(?string $color = null): self
    {
        $this->options['style'] = $color;
        return $this;
    }
}
