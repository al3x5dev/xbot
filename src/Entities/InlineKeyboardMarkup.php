<?php

namespace Al3x5\xBot\Entities;

/**
 * InlineKeyboardMarkup Entity
 * @property \ArrayOfInlineKeyboardButton[] $inline_keyboard;
 */
class InlineKeyboardMarkup extends EntityBase
{
    protected function getEntities(): array
    {
        return [
            'inline_keyboard' => [InlineKeyboardButton::class]
        ];
    }

    /**
     * Crea botoneta inline
     */
    public static function create(): self
    {
        $keyboard = new self(['inline_keyboard' => []]);
        return $keyboard;
    }

    /**
     * Agrega filas de botones
     */
    public function addRow(InlineKeyboardButton ...$buttons): static
    {
        $this->buttons[] = $buttons;
        return $this;
    }

    public function jsonSerialize(): array
    {
        $this->__set('inline_keyboard', $this->buttons);
        return ['inline_keyboard' => $this->__get('inline_keyboard')];
    }
}
