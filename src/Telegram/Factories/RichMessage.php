<?php

namespace Al3x5\xBot\Telegram\Factories;

use Al3x5\xBot\Telegram\Entities\InputRichMessage;
use Al3x5\xBot\Telegram\Entity;

class RichMessage
{
    private array $blocks = [];
    private array $options = [];

    public static function make(): self
    {
        return new self();
    }

    public function block(Entity $block): self
    {
        $this->blocks[] = $block;
        return $this;
    }

    public function html(string $html): self
    {
        $this->options['html'] = $html;
        return $this;
    }

    public function markdown(string $markdown): self
    {
        $this->options['markdown'] = $markdown;
        return $this;
    }

    public function rtl(bool $v = true): self
    {
        $this->options['is_rtl'] = $v;
        return $this;
    }

    public function build(): InputRichMessage
    {
        $msg = new InputRichMessage([]);
        $msg->blocks = $this->blocks;       // ← asigna directo (usa __set)
        foreach ($this->options as $k => $v) {
            $msg->{$k} = $v;
        }
        return $msg;
    }
}
