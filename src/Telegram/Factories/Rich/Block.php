<?php

namespace Al3x5\xBot\Telegram\Factories\Rich;

use Al3x5\xBot\Telegram\Entities\InputMediaAnimation;
use Al3x5\xBot\Telegram\Entities\InputMediaAudio;
use Al3x5\xBot\Telegram\Entities\InputMediaPhoto;
use Al3x5\xBot\Telegram\Entities\InputMediaVideo;
use Al3x5\xBot\Telegram\Entities\InputMediaVoiceNote;
use Al3x5\xBot\Telegram\Entities\InputRichBlock;
use Al3x5\xBot\Telegram\Entities\InputRichBlockAnchor;
use Al3x5\xBot\Telegram\Entities\InputRichBlockAnimation;
use Al3x5\xBot\Telegram\Entities\InputRichBlockAudio;
use Al3x5\xBot\Telegram\Entities\InputRichBlockBlockQuotation;
use Al3x5\xBot\Telegram\Entities\InputRichBlockCollage;
use Al3x5\xBot\Telegram\Entities\InputRichBlockDetails;
use Al3x5\xBot\Telegram\Entities\InputRichBlockDivider;
use Al3x5\xBot\Telegram\Entities\InputRichBlockFooter;
use Al3x5\xBot\Telegram\Entities\InputRichBlockList;
use Al3x5\xBot\Telegram\Entities\InputRichBlockListItem;
use Al3x5\xBot\Telegram\Entities\InputRichBlockMap;
use Al3x5\xBot\Telegram\Entities\InputRichBlockMathematicalExpression;
use Al3x5\xBot\Telegram\Entities\InputRichBlockParagraph;
use Al3x5\xBot\Telegram\Entities\InputRichBlockPhoto;
use Al3x5\xBot\Telegram\Entities\InputRichBlockPreformatted;
use Al3x5\xBot\Telegram\Entities\InputRichBlockPullQuotation;
use Al3x5\xBot\Telegram\Entities\InputRichBlockSectionHeading;
use Al3x5\xBot\Telegram\Entities\InputRichBlockSlideshow;
use Al3x5\xBot\Telegram\Entities\InputRichBlockThinking;
use Al3x5\xBot\Telegram\Entities\InputRichBlockVideo;
use Al3x5\xBot\Telegram\Entities\InputRichBlockVoiceNote;
use Al3x5\xBot\Telegram\Entities\RichBlockCaption;
use Al3x5\xBot\Telegram\Entities\RichText;

class Block
{
    public static function paragraph(string|RichText|array $text): InputRichBlockParagraph
    {
        return new InputRichBlockParagraph([
            'type' => InputRichBlock::TYPE_PARAGRAPH,
            'text' => $text,
        ]);
    }

    public static function heading(string|RichText|array $text, int $size = 1): InputRichBlockSectionHeading
    {
        return new InputRichBlockSectionHeading([
            'type' => InputRichBlock::TYPE_HEADING,
            'text' => $text,
            'size' => $size,
        ]);
    }

    public static function preformatted(string|RichText|array $text, string $language = ''): InputRichBlockPreformatted
    {
        $data = [
            'type' => InputRichBlock::TYPE_PREFORMATTED,
            'text' => $text,
        ];
        if ($language !== '') {
            $data['language'] = $language;
        }
        return new InputRichBlockPreformatted($data);
    }

    public static function footer(string|RichText|array $text): InputRichBlockFooter
    {
        return new InputRichBlockFooter([
            'type' => InputRichBlock::TYPE_FOOTER,
            'text' => $text,
        ]);
    }

    public static function divider(): InputRichBlockDivider
    {
        return new InputRichBlockDivider([
            'type' => InputRichBlock::TYPE_DIVIDER,
        ]);
    }

    public static function thinking(string|RichText|array $text): InputRichBlockThinking
    {
        return new InputRichBlockThinking([
            'type' => InputRichBlock::TYPE_THINKING,
            'text' => $text,
        ]);
    }

    public static function blockQuote(array $blocks, string|RichText|null $credit = null): InputRichBlockBlockQuotation
    {
        $data = [
            'type' => InputRichBlock::TYPE_BLOCK_QUOTATION,
            'blocks' => $blocks,
        ];
        if ($credit !== null) {
            $data['credit'] = $credit;
        }
        return new InputRichBlockBlockQuotation($data);
    }

    public static function pullQuote(string|RichText|array $text, string|RichText|null $credit = null): InputRichBlockPullQuotation
    {
        $data = [
            'type' => InputRichBlock::TYPE_PULL_QUOTATION,
            'text' => $text,
        ];
        if ($credit !== null) {
            $data['credit'] = $credit;
        }
        return new InputRichBlockPullQuotation($data);
    }

    public static function photo(
        string $media,
        string|RichText|null $caption = null,
        string|RichText|null $credit = null
    ): InputRichBlockPhoto {
        $data = [
            'type' => InputRichBlock::TYPE_PHOTO,
            'photo' => new InputMediaPhoto([
                'type' => 'photo',
                'media' => $media,
            ]),
        ];
        if ($caption !== null || $credit !== null) {
            $captionData = [];
            if ($caption !== null) {
                $captionData['text'] = $caption;
            }
            if ($credit !== null) {
                $captionData['credit'] = $credit;
            }
            $data['caption'] = new RichBlockCaption($captionData);
        }
        return new InputRichBlockPhoto($data);
    }

    public static function video(
        string $media,
        string|RichText|null $caption = null,
        string|RichText|null $credit = null
    ): InputRichBlockVideo {
        $data = [
            'type' => InputRichBlock::TYPE_VIDEO,
            'video' => new InputMediaVideo([
                'type' => 'video',
                'media' => $media,
            ]),
        ];
        if ($caption !== null || $credit !== null) {
            $captionData = [];
            if ($caption !== null) {
                $captionData['text'] = $caption;
            }
            if ($credit !== null) {
                $captionData['credit'] = $credit;
            }
            $data['caption'] = new RichBlockCaption($captionData);
        }
        return new InputRichBlockVideo($data);
    }

    public static function audio(
        string $media,
        string|RichText|null $caption = null,
        string|RichText|null $credit = null
    ): InputRichBlockAudio {
        $data = [
            'type' => InputRichBlock::TYPE_AUDIO,
            'audio' => new InputMediaAudio([
                'type' => 'audio',
                'media' => $media,
            ]),
        ];
        if ($caption !== null || $credit !== null) {
            $captionData = [];
            if ($caption !== null) {
                $captionData['text'] = $caption;
            }
            if ($credit !== null) {
                $captionData['credit'] = $credit;
            }
            $data['caption'] = new RichBlockCaption($captionData);
        }
        return new InputRichBlockAudio($data);
    }

    public static function animation(
        string $media,
        string|RichText|null $caption = null,
        string|RichText|null $credit = null
    ): InputRichBlockAnimation {
        $data = [
            'type' => InputRichBlock::TYPE_ANIMATION,
            'animation' => new InputMediaAnimation([
                'type' => 'animation',
                'media' => $media,
            ]),
        ];
        if ($caption !== null || $credit !== null) {
            $captionData = [];
            if ($caption !== null) {
                $captionData['text'] = $caption;
            }
            if ($credit !== null) {
                $captionData['credit'] = $credit;
            }
            $data['caption'] = new RichBlockCaption($captionData);
        }
        return new InputRichBlockAnimation($data);
    }

    public static function voiceNote(
        string $media,
        string|RichText|null $caption = null,
        string|RichText|null $credit = null
    ): InputRichBlockVoiceNote {
        $data = [
            'type' => InputRichBlock::TYPE_VOICE_NOTE,
            'voice_note' => new InputMediaVoiceNote([
                'type' => 'voice',
                'media' => $media,
            ]),
        ];
        if ($caption !== null || $credit !== null) {
            $captionData = [];
            if ($caption !== null) {
                $captionData['text'] = $caption;
            }
            if ($credit !== null) {
                $captionData['credit'] = $credit;
            }
            $data['caption'] = new RichBlockCaption($captionData);
        }
        return new InputRichBlockVoiceNote($data);
    }

    public static function table(): Table
    {
        return new Table();
    }

    public static function list(array $items): InputRichBlockList
    {
        $listItems = [];
        foreach ($items as $item) {
            if ($item instanceof InputRichBlock) {
                $listItems[] = new InputRichBlockListItem([
                    'blocks' => [$item],
                ]);
            } elseif (is_array($item)) {
                $listItems[] = new InputRichBlockListItem([
                    'blocks' => $item,
                ]);
            }
        }
        return new InputRichBlockList([
            'type' => InputRichBlock::TYPE_LIST,
            'items' => $listItems,
        ]);
    }

    public static function details(
        string|RichText|array $summary,
        array $blocks,
        bool $is_open = false
    ): InputRichBlockDetails {
        return new InputRichBlockDetails([
            'type' => InputRichBlock::TYPE_DETAILS,
            'summary' => $summary,
            'blocks' => $blocks,
            'is_open' => $is_open,
        ]);
    }

    public static function collage(
        array $blocks,
        string|RichText|null $caption = null,
        string|RichText|null $credit = null
    ): InputRichBlockCollage {
        $data = [
            'type' => InputRichBlock::TYPE_COLLAGE,
            'blocks' => $blocks,
        ];
        if ($caption !== null || $credit !== null) {
            $captionData = [];
            if ($caption !== null) {
                $captionData['text'] = $caption;
            }
            if ($credit !== null) {
                $captionData['credit'] = $credit;
            }
            $data['caption'] = new RichBlockCaption($captionData);
        }
        return new InputRichBlockCollage($data);
    }

    public static function slideshow(
        array $blocks,
        string|RichText|null $caption = null,
        string|RichText|null $credit = null
    ): InputRichBlockSlideshow {
        $data = [
            'type' => InputRichBlock::TYPE_SLIDESHOW,
            'blocks' => $blocks,
        ];
        if ($caption !== null || $credit !== null) {
            $captionData = [];
            if ($caption !== null) {
                $captionData['text'] = $caption;
            }
            if ($credit !== null) {
                $captionData['credit'] = $credit;
            }
            $data['caption'] = new RichBlockCaption($captionData);
        }
        return new InputRichBlockSlideshow($data);
    }

    public static function map(
        array $location,
        int $zoom = 15,
        int $width = 300,
        int $height = 200,
        string|RichText|null $caption = null,
        string|RichText|null $credit = null
    ): InputRichBlockMap {
        $data = [
            'type' => InputRichBlock::TYPE_MAP,
            'location' => $location,
            'zoom' => $zoom,
            'width' => $width,
            'height' => $height,
        ];
        if ($caption !== null || $credit !== null) {
            $captionData = [];
            if ($caption !== null) {
                $captionData['text'] = $caption;
            }
            if ($credit !== null) {
                $captionData['credit'] = $credit;
            }
            $data['caption'] = new RichBlockCaption($captionData);
        }
        return new InputRichBlockMap($data);
    }

    public static function math(string $expression): InputRichBlockMathematicalExpression
    {
        return new InputRichBlockMathematicalExpression([
            'type' => InputRichBlock::TYPE_MATHEMATICAL_EXPRESSION,
            'expression' => $expression,
        ]);
    }

    public static function anchor(string $name): InputRichBlockAnchor
    {
        return new InputRichBlockAnchor([
            'type' => InputRichBlock::TYPE_ANCHOR,
            'name' => $name,
        ]);
    }
}
