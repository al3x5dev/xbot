<?php

namespace Al3x5\xBot\Telegram\Entities;

use Al3x5\xBot\Telegram\Entity;

/**
 * RichBlock Entity
 */
class RichBlock extends Entity
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
            'paragraph' => new RichBlockParagraph($this->properties),
            'section_heading' => new RichBlockSectionHeading($this->properties),
            'preformatted' => new RichBlockPreformatted($this->properties),
            'footer' => new RichBlockFooter($this->properties),
            'divider' => new RichBlockDivider($this->properties),
            'mathematical_expression' => new RichBlockMathematicalExpression($this->properties),
            'anchor' => new RichBlockAnchor($this->properties),
            'list' => new RichBlockList($this->properties),
            'block_quotation' => new RichBlockBlockQuotation($this->properties),
            'pull_quotation' => new RichBlockPullQuotation($this->properties),
            'collage' => new RichBlockCollage($this->properties),
            'slideshow' => new RichBlockSlideshow($this->properties),
            'table' => new RichBlockTable($this->properties),
            'details' => new RichBlockDetails($this->properties),
            'map' => new RichBlockMap($this->properties),
            'animation' => new RichBlockAnimation($this->properties),
            'audio' => new RichBlockAudio($this->properties),
            'photo' => new RichBlockPhoto($this->properties),
            'video' => new RichBlockVideo($this->properties),
            'voice_note' => new RichBlockVoiceNote($this->properties),
            'thinking' => new RichBlockThinking($this->properties),
            default => throw new \InvalidArgumentException('Unknown RichBlock type: ' . $this->type),
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
            self::TYPE_PARAGRAPH => new RichBlockParagraph($data),
            self::TYPE_SECTION_HEADING => new RichBlockSectionHeading($data),
            self::TYPE_PREFORMATTED => new RichBlockPreformatted($data),
            self::TYPE_FOOTER => new RichBlockFooter($data),
            self::TYPE_DIVIDER => new RichBlockDivider($data),
            self::TYPE_MATHEMATICAL_EXPRESSION => new RichBlockMathematicalExpression($data),
            self::TYPE_ANCHOR => new RichBlockAnchor($data),
            self::TYPE_LIST => new RichBlockList($data),
            self::TYPE_BLOCK_QUOTATION => new RichBlockBlockQuotation($data),
            self::TYPE_PULL_QUOTATION => new RichBlockPullQuotation($data),
            self::TYPE_COLLAGE => new RichBlockCollage($data),
            self::TYPE_SLIDESHOW => new RichBlockSlideshow($data),
            self::TYPE_TABLE => new RichBlockTable($data),
            self::TYPE_DETAILS => new RichBlockDetails($data),
            self::TYPE_MAP => new RichBlockMap($data),
            self::TYPE_ANIMATION => new RichBlockAnimation($data),
            self::TYPE_AUDIO => new RichBlockAudio($data),
            self::TYPE_PHOTO => new RichBlockPhoto($data),
            self::TYPE_VIDEO => new RichBlockVideo($data),
            self::TYPE_VOICE_NOTE => new RichBlockVoiceNote($data),
            self::TYPE_THINKING => new RichBlockThinking($data),
            default => throw new \InvalidArgumentException('Unknown RichBlock type: ' . ($data['type'] ?? 'null')),
        };
    }

}
