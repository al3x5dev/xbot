<?php

namespace Al3x5\xBot\Cli;

class Style
{
    // Colors
    public const Black = "\033[0;30m%s\033[0m";
    public const Red = "\033[0;31m%s\033[0m";
    public const Green = "\033[0;32m%s\033[0m";
    public const Yellow = "\033[0;33m%s\033[0m";
    public const Blue = "\033[0;34m%s\033[0m";
    public const Purple = "\033[0;35m%s\033[0m";
    public const Cyan = "\033[0;36m%s\033[0m";
    public const Gray = "\033[0;37m%s\033[0m";
    public const Graphite = "\033[1;30m%s\033[0m";
    // Highlights
    public const BoldRed = "\033[1;31m%s\033[0m";
    public const BoldGreen = "\033[1;32m%s\033[0m";
    public const BoldYellow = "\033[1;33m%s\033[0m";
    public const BoldBlue = "\033[1;34m%s\033[0m";
    public const BoldPurple = "\033[1;35m%s\033[0m";
    public const BoldCyan = "\033[1;36m%s\033[0m";
    public const BoldWhite = "\033[1;37m%s\033[0m";
    // Backgrounds
    public const BgBlack = "\033[40;1;37m%s\033[0m";
    public const BgRed = "\033[41;1;37m%s\033[0m";
    public const BgGreen = "\033[42;1;37m%s\033[0m";
    public const BgYellow = "\033[43;1;37m%s\033[0m";
    public const BgBlue = "\033[44;1;37m%s\033[0m";
    public const BgPurple = "\033[45;1;37m%s\033[0m";
    public const BgCyan = "\033[46;1;37m%s\033[0m";
    public const BgGray = "\033[47;1;37m%s\033[0m";
    // Format Text
    public const Underscore = "\033[4;37m%s\033[0m";
    public const Inverted = "\033[7;37m%s\033[0m";
    public const Blink = "\033[5;37m%s\033[0m";

    /**
     * Funcion formateadora
     */
    public static function format(string $text, string $property): string
    {
        return sprintf($property, $text);
    }

    /**
     * Establece el color del fondo
     * 
     */
    public static function bgColor(string $text, string $color, bool $uppercase = true): string
    {
        if ($uppercase) {
            $text = strtoupper($text);
        }

        $text = " $text ";

        return match ($color) {
            'black' => self::format(PHP_EOL.$text, self::BgBlack),
            'red' => self::format(PHP_EOL.$text, self::BgRed),
            'green' => self::format(PHP_EOL.$text, self::BgGreen),
            'yellow' => self::format(PHP_EOL.$text, self::BgYellow),
            'blue' => self::format(PHP_EOL.$text, self::BgBlue),
            'purple' => self::format(PHP_EOL.$text, self::BgPurple),
            'cyan' => self::format(PHP_EOL.$text, self::BgCyan),
            'gray' => self::format(PHP_EOL.$text, self::BgGray),
        };
    }

    /**
     * Resaltado
     */
    public static function highlights(string $text, string $color): string
    {
        return match ($color) {
            'red' => self::format($text, self::BoldRed),
            'green' => self::format($text, self::BoldGreen),
            'yellow' => self::format($text, self::BoldYellow),
            'blue' => self::format($text, self::BoldBlue),
            'purple' => self::format($text, self::BoldPurple),
            'cyan' => self::format($text, self::BoldCyan),
            'white' => self::format($text, self::BoldWhite),
        };
    }

    /**
     * Color de texto
     */
    public static function color(string $text, string $color): string
    {
        return match ($color) {
            'black' => self::format($text, self::Black),
            'red' => self::format($text, self::Red),
            'green' => self::format($text, self::Green),
            'yellow' => self::format($text, self::Yellow),
            'blue' => self::format($text, self::Blue),
            'purple' => self::format($text, self::Purple),
            'cyan' => self::format($text, self::Cyan),
            'gray' => self::format($text, self::Gray),
            'graphite' => self::format($text, self::Graphite),
        };
    }
}
