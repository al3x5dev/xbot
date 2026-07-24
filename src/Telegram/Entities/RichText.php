<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichText Entity
 */
class RichText extends Entity
{
    
    public const TYPE_BOLD = 'bold';
    public const TYPE_ITALIC = 'italic';
    public const TYPE_UNDERLINE = 'underline';
    public const TYPE_STRIKETHROUGH = 'strikethrough';
    public const TYPE_SPOILER = 'spoiler';
    public const TYPE_DATETIME = 'datetime';
    public const TYPE_TEXT_MENTION = 'text_mention';
    public const TYPE_SUBSCRIPT = 'subscript';
    public const TYPE_SUPERSCRIPT = 'superscript';
    public const TYPE_MARKED = 'marked';
    public const TYPE_CODE = 'code';
    public const TYPE_CUSTOM_EMOJI = 'custom_emoji';
    public const TYPE_MATHEMATICAL_EXPRESSION = 'mathematical_expression';
    public const TYPE_URL = 'url';
    public const TYPE_EMAIL_ADDRESS = 'email_address';
    public const TYPE_PHONE_NUMBER = 'phone_number';
    public const TYPE_BANK_CARD_NUMBER = 'bank_card_number';
    public const TYPE_MENTION = 'mention';
    public const TYPE_HASHTAG = 'hashtag';
    public const TYPE_CASHTAG = 'cashtag';
    public const TYPE_BOT_COMMAND = 'bot_command';
    public const TYPE_ANCHOR = 'anchor';
    public const TYPE_ANCHOR_LINK = 'anchor_link';
    public const TYPE_REFERENCE = 'reference';
    public const TYPE_REFERENCE_LINK = 'reference_link';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'bold' => new RichTextBold($this->properties),
            'italic' => new RichTextItalic($this->properties),
            'underline' => new RichTextUnderline($this->properties),
            'strikethrough' => new RichTextStrikethrough($this->properties),
            'spoiler' => new RichTextSpoiler($this->properties),
            'datetime' => new RichTextDateTime($this->properties),
            'text_mention' => new RichTextTextMention($this->properties),
            'subscript' => new RichTextSubscript($this->properties),
            'superscript' => new RichTextSuperscript($this->properties),
            'marked' => new RichTextMarked($this->properties),
            'code' => new RichTextCode($this->properties),
            'custom_emoji' => new RichTextCustomEmoji($this->properties),
            'mathematical_expression' => new RichTextMathematicalExpression($this->properties),
            'url' => new RichTextUrl($this->properties),
            'email_address' => new RichTextEmailAddress($this->properties),
            'phone_number' => new RichTextPhoneNumber($this->properties),
            'bank_card_number' => new RichTextBankCardNumber($this->properties),
            'mention' => new RichTextMention($this->properties),
            'hashtag' => new RichTextHashtag($this->properties),
            'cashtag' => new RichTextCashtag($this->properties),
            'bot_command' => new RichTextBotCommand($this->properties),
            'anchor' => new RichTextAnchor($this->properties),
            'anchor_link' => new RichTextAnchorLink($this->properties),
            'reference' => new RichTextReference($this->properties),
            'reference_link' => new RichTextReferenceLink($this->properties),
            default => throw new \InvalidArgumentException('Unknown RichText type: ' . $this->type),
        };
    }

    /**
     * Factory: creates the correct subclass based on type
     *
     * @param array $data Must contain 'type' key
     * @return Entity
     * @throws \InvalidArgumentException
     */
    public static function create(array $data): Entity
    {
        return match($data['type'] ?? null) {
            self::TYPE_BOLD => new RichTextBold($data),
            self::TYPE_ITALIC => new RichTextItalic($data),
            self::TYPE_UNDERLINE => new RichTextUnderline($data),
            self::TYPE_STRIKETHROUGH => new RichTextStrikethrough($data),
            self::TYPE_SPOILER => new RichTextSpoiler($data),
            self::TYPE_DATETIME => new RichTextDateTime($data),
            self::TYPE_TEXT_MENTION => new RichTextTextMention($data),
            self::TYPE_SUBSCRIPT => new RichTextSubscript($data),
            self::TYPE_SUPERSCRIPT => new RichTextSuperscript($data),
            self::TYPE_MARKED => new RichTextMarked($data),
            self::TYPE_CODE => new RichTextCode($data),
            self::TYPE_CUSTOM_EMOJI => new RichTextCustomEmoji($data),
            self::TYPE_MATHEMATICAL_EXPRESSION => new RichTextMathematicalExpression($data),
            self::TYPE_URL => new RichTextUrl($data),
            self::TYPE_EMAIL_ADDRESS => new RichTextEmailAddress($data),
            self::TYPE_PHONE_NUMBER => new RichTextPhoneNumber($data),
            self::TYPE_BANK_CARD_NUMBER => new RichTextBankCardNumber($data),
            self::TYPE_MENTION => new RichTextMention($data),
            self::TYPE_HASHTAG => new RichTextHashtag($data),
            self::TYPE_CASHTAG => new RichTextCashtag($data),
            self::TYPE_BOT_COMMAND => new RichTextBotCommand($data),
            self::TYPE_ANCHOR => new RichTextAnchor($data),
            self::TYPE_ANCHOR_LINK => new RichTextAnchorLink($data),
            self::TYPE_REFERENCE => new RichTextReference($data),
            self::TYPE_REFERENCE_LINK => new RichTextReferenceLink($data),
            default => throw new \InvalidArgumentException('Unknown RichText type: ' . ($data['type'] ?? 'null')),
        };
    }

}
