<?php

namespace Al3x5\xBot;

/**
 * Keyboards class
 */
class Keyboard
{
    private ?string $markup = null;

    public function __construct(array $reply_markup)
    {
        $this->markup = json_encode($reply_markup);
    }

    /**
     * Crea un teclado en línea
     */
    public static function inline(array $buttons): string
    {
        $inline_keyboard = [
            'inline_keyboard' => $buttons,
        ];
        return (new static($inline_keyboard))->markup;
    }

    /**
     * Crear un teclado simple
     */
    public static function simple(
        array $buttons,
        bool $resize = true,
        bool $oneTime = false
    ): string {
        $reply_keyboard = [
            'keyboard' => $buttons,
            'resize_keyboard' => $resize, // Redimensionar el teclado
            'one_time_keyboard' => $oneTime, // Ocultar el teclado después de usarlo
        ];
        return (new static($reply_keyboard))->markup;
    }

    /**
     * Elimina teclado de botones
     */
    public static function remove(): string
    {
        $remove_keyboard = [
            'remove_keyboard' => true,
        ];
        return (new static($remove_keyboard))->markup;
    }

    /**
     * Fuerza respuesta al usuario
     */
    public static function forceReply(array $params = []): string
    {
        return (
            new static(
                array_merge(['force_reply' => true], $params)
            )
        )->markup;
    }
}
