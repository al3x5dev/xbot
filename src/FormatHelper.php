<?php

namespace Al3x5\xBot;

class FormatHelper
{
    /**
     * Formato: Negritas
     */
    public static function bold(string $text): string
    {
        return "<b>$text</b>";
    }

    /**
     * Formato: Cursiva
     */
    public static function italic(string $text): string
    {
        return "<i>$text</i>";
    }

    /**
     * Formato: Subrayado
     */
    public static function underline(string $text): string
    {
        return "<u>$text</u>";
    }

    /**
     * Formato: Tachado
     */
    public static function strikethrough(string $text): string
    {
        return "<s>$text</s>";
    }

    /**
     * Formato: Spoiler
     */
    public static function spoiler(string $text): string
    {
        return "<tg-spoiler>$text</tg-spoiler>";
    }

    /**
     * Formato: Enlace
     */
    public static function link(string $text, string $url): string
    {
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
        self::sanitize($emoji);
        return "<tg-emoji emoji-id=\"$emojiId\">$emoji</tg-emoji>";
    }

    /**
     * Formato: Código en línea
     */
    public static function inlineCode(string $text): string
    {
        $text = self::sanitize($text);
        return "<code>$text</code>";
    }

    /**
     * Formato: Bloque de código
     */
    public static function codeBlock(string $text, string $language = ''): string
    {
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
        return "<blockquote>$text</blockquote>";
    }

    /**
     * Formato: Cita expandible
     */
    public static function expandableBlockQuote(string $text): string
    {
        return "<blockquote expandable>$text</blockquote>";
    }

    /**
     * Sanear texto
     */
    private static function sanitize(string $text): string
    {
        return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    }
}
