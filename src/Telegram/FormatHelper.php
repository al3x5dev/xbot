<?php

namespace Al3x5\xBot\Telegram;

use Al3x5\xBot\Config;

class FormatHelper
{
    /**
     * Formato: Negritas
     */
    public static function bold(string $text): string
    {
        return self::isHtml() ? "<b>$text</b>" : "*$text*";
    }

    /**
     * Formato: Cursiva
     */
    public static function italic(string $text): string
    {
        return self::isHtml() ? "<i>$text</i>" : '_' . $text . '_';
    }

    /**
     * Formato: Subrayado
     */
    public static function underline(string $text): string
    {
        return self::isHtml() ? "<u>$text</u>" : '__' . $text . '__';
    }

    /**
     * Formato: Tachado
     */
    public static function strikethrough(string $text): string
    {
        return self::isHtml() ? "<s>$text</s>" : "~$text~";
    }

    /**
     * Formato: Spoiler
     */
    public static function spoiler(string $text): string
    {
        return self::isHtml() ? "<tg-spoiler>$text</tg-spoiler>" : "||$text||";
    }

    /**
     * Formato: Enlace
     */
    public static function link(string $text, string $url): string
    {
        if (!self::isHtml()) {
            return "[$text]($url)";
        }
        $text = self::sanitize($text, 'link');
        return "<a href=\"$url\">$text</a>";
    }

    /**
     * Formato: Mención de usuario
     */
    public static function mention(string $text, int $userId): string
    {
        return self::link($text, "tg://user?id=$userId");
    }

    /**
     * Formato: Emoji personalizado
     */
    public static function emoji(string $emoji, string $emojiId): string
    {
        if (!self::isHtml()) {
            return $emoji;
        }
        self::sanitize($emoji);
        return "<tg-emoji emoji-id=\"$emojiId\">$emoji</tg-emoji>";
    }

    /**
     * Formato: Código en línea
     */
    public static function inlineCode(string $text): string
    {
        if (!self::isHtml()) {
            return "`$text`";
        }
        $text = self::sanitize($text);
        return "<code>$text</code>";
    }

    /**
     * Formato: Bloque de código
     */
    public static function codeBlock(string $text, string $language = ''): string
    {
        if (!self::isHtml()) {
            return "```$language\n$text\n```";
        }
        $text = self::sanitize($text);
        return $language
            ? "<pre><code class=\"language-$language\">$text</code></pre>"
            : "<pre>$text</pre>";
    }

    /**
     * Formato: Cita en bloque
     */
    public static function blockQuote(string $text): string
    {
        return self::isHtml() ? "<blockquote>$text</blockquote>" : "> $text";
    }

    /**
     * Formato: Cita expandible
     */
    public static function expandableBlockQuote(string $text): string
    {
        return self::isHtml() ? "<blockquote expandable>$text</blockquote>" : ">$text";
    }

    /**
     * Formato: Tiempo/Timestamp
     * 
     * @param int $unix Timestamp unix
     * @param string $format Formato: 'wDT', 't', 'r', o vacío
     * 
     * r: Muestra la hora en relación con la hora actual. No se puede combinar 
     * con ningún otro carácter de control.
     * w: Muestra el día de la semana en el idioma del usuario.
     * d: Muestra la fecha en formato abreviado (por ejemplo, “17.03.22”).
     * D: Muestra la fecha en formato largo (por ejemplo, “17 de marzo de 2022”).
     * t: Muestra la hora en formato abreviado (por ejemplo, “22:45”).
     * T: Muestra la hora en formato largo (por ejemplo, “22:45:00”).

     */
    public static function time(int $unix, string $format = ''): string
    {
        if (!self::isHtml()) {
            // MarkdownV2: ![texto](tg://time?unix=XXX&format=Y)
            $url = "tg://time?unix=$unix" . ($format ? "&format=$format" : '');
            return "![fecha]($url)";
        }
        // HTML: <tg-time unix="XXX" format="Y">texto</tg-time>
        return $format
            ? "<tg-time unix=\"$unix\" format=\"$format\">fecha</tg-time>"
            : "<tg-time unix=\"$unix\">fecha</tg-time>";
    }

    /**
     * Sanear texto
     */
    private static function sanitize(string $text): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }

    private static function isHtml(): bool
    {
        return Config::get('parse_mode') == 'HTML';
    }
}
