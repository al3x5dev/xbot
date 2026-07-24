<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * InputRichBlock Entity
 */
class InputRichBlock extends Entity
{
    
    public const TYPE_PARAGRAPH = 'paragraph';
    public const TYPE_SECTION_HEADING = 'section_heading';
    public const TYPE_PREFORMATTED = 'preformatted';
    public const TYPE_FOOTER = 'footer';
    public const TYPE_DIVIDER = 'divider';
    public const TYPE_MATHEMATICAL_EXPRESSION = 'mathematical_expression';
    public const TYPE_ANCHOR = 'anchor';
    public const TYPE_LIST = 'list';
    public const TYPE_BLOCK_QUOTATION = 'block_quotation';
    public const TYPE_PULL_QUOTATION = 'pull_quotation';
    public const TYPE_COLLAGE = 'collage';
    public const TYPE_SLIDESHOW = 'slideshow';
    public const TYPE_TABLE = 'table';
    public const TYPE_DETAILS = 'details';
    public const TYPE_MAP = 'map';
    public const TYPE_ANIMATION = 'animation';
    public const TYPE_AUDIO = 'audio';
    public const TYPE_PHOTO = 'photo';
    public const TYPE_VIDEO = 'video';
    public const TYPE_VOICE_NOTE = 'voice_note';
    public const TYPE_THINKING = 'thinking';

    protected function setEntities(): array
    {
        return [];
    }
    public function resolve(): Entity
    {
        return match($this->type) {
            'paragraph' => new InputRichBlockParagraph($this->properties),
            'section_heading' => new InputRichBlockSectionHeading($this->properties),
            'preformatted' => new InputRichBlockPreformatted($this->properties),
            'footer' => new InputRichBlockFooter($this->properties),
            'divider' => new InputRichBlockDivider($this->properties),
            'mathematical_expression' => new InputRichBlockMathematicalExpression($this->properties),
            'anchor' => new InputRichBlockAnchor($this->properties),
            'list' => new InputRichBlockList($this->properties),
            'block_quotation' => new InputRichBlockBlockQuotation($this->properties),
            'pull_quotation' => new InputRichBlockPullQuotation($this->properties),
            'collage' => new InputRichBlockCollage($this->properties),
            'slideshow' => new InputRichBlockSlideshow($this->properties),
            'table' => new InputRichBlockTable($this->properties),
            'details' => new InputRichBlockDetails($this->properties),
            'map' => new InputRichBlockMap($this->properties),
            'animation' => new InputRichBlockAnimation($this->properties),
            'audio' => new InputRichBlockAudio($this->properties),
            'photo' => new InputRichBlockPhoto($this->properties),
            'video' => new InputRichBlockVideo($this->properties),
            'voice_note' => new InputRichBlockVoiceNote($this->properties),
            'thinking' => new InputRichBlockThinking($this->properties),
            default => throw new \InvalidArgumentException('Unknown InputRichBlock type: ' . $this->type),
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
            self::TYPE_PARAGRAPH => new InputRichBlockParagraph($data),
            self::TYPE_SECTION_HEADING => new InputRichBlockSectionHeading($data),
            self::TYPE_PREFORMATTED => new InputRichBlockPreformatted($data),
            self::TYPE_FOOTER => new InputRichBlockFooter($data),
            self::TYPE_DIVIDER => new InputRichBlockDivider($data),
            self::TYPE_MATHEMATICAL_EXPRESSION => new InputRichBlockMathematicalExpression($data),
            self::TYPE_ANCHOR => new InputRichBlockAnchor($data),
            self::TYPE_LIST => new InputRichBlockList($data),
            self::TYPE_BLOCK_QUOTATION => new InputRichBlockBlockQuotation($data),
            self::TYPE_PULL_QUOTATION => new InputRichBlockPullQuotation($data),
            self::TYPE_COLLAGE => new InputRichBlockCollage($data),
            self::TYPE_SLIDESHOW => new InputRichBlockSlideshow($data),
            self::TYPE_TABLE => new InputRichBlockTable($data),
            self::TYPE_DETAILS => new InputRichBlockDetails($data),
            self::TYPE_MAP => new InputRichBlockMap($data),
            self::TYPE_ANIMATION => new InputRichBlockAnimation($data),
            self::TYPE_AUDIO => new InputRichBlockAudio($data),
            self::TYPE_PHOTO => new InputRichBlockPhoto($data),
            self::TYPE_VIDEO => new InputRichBlockVideo($data),
            self::TYPE_VOICE_NOTE => new InputRichBlockVoiceNote($data),
            self::TYPE_THINKING => new InputRichBlockThinking($data),
            default => throw new \InvalidArgumentException('Unknown InputRichBlock type: ' . ($data['type'] ?? 'null')),
        };
    }

}
