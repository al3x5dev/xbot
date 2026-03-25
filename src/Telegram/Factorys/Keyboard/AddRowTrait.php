<?php

namespace Al3x5\xBot\Telegram\Factorys\Keyboard;

trait AddRowTrait{
    public function row(ButtonInterface ...$button): self
    {
        // Verifica de que cada botón esté construido
        $this->rows[] = array_map(fn($b) => $b->build(), $button);
        return $this;
    }
}