<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\FormatHelper;
use PHPUnit\Framework\TestCase;

class FormatHelperTest extends TestCase
{
    public function testBold(): void
    {
        $result = FormatHelper::bold('Hello');
        $this->assertEquals('<b>Hello</b>', $result);
    }

    public function testItalic(): void
    {
        $result = FormatHelper::italic('Hello');
        $this->assertEquals('<i>Hello</i>', $result);
    }

    public function testUnderline(): void
    {
        $result = FormatHelper::underline('Hello');
        $this->assertEquals('<u>Hello</u>', $result);
    }

    public function testStrikethrough(): void
    {
        $result = FormatHelper::strikethrough('Hello');
        $this->assertEquals('<s>Hello</s>', $result);
    }

    public function testSpoiler(): void
    {
        $result = FormatHelper::spoiler('Hello');
        $this->assertEquals('<tg-spoiler>Hello</tg-spoiler>', $result);
    }

    public function testLink(): void
    {
        $result = FormatHelper::link('Click here', 'https://example.com');
        $this->assertEquals('<a href="https://example.com">Click here</a>', $result);
    }

    public function testMention(): void
    {
        $result = FormatHelper::mention('John', 123456);
        $this->assertEquals('<a href="tg://user?id=123456">John</a>', $result);
    }

    public function testEmoji(): void
    {
        $result = FormatHelper::emoji('😀', '123456789');
        $this->assertEquals('<tg-emoji emoji-id="123456789">😀</tg-emoji>', $result);
    }

    public function testInlineCode(): void
    {
        $result = FormatHelper::inlineCode('code');
        $this->assertEquals('<code>code</code>', $result);
    }

    public function testCodeBlockWithoutLanguage(): void
    {
        $result = FormatHelper::codeBlock('code');
        $this->assertEquals('<pre>code</pre>', $result);
    }

    public function testCodeBlockWithLanguage(): void
    {
        $result = FormatHelper::codeBlock('code', 'php');
        $this->assertEquals('<pre><code class="language-php">code</code></pre>', $result);
    }

    public function testBlockQuote(): void
    {
        $result = FormatHelper::blockQuote('Quote');
        $this->assertEquals('<blockquote>Quote</blockquote>', $result);
    }

    public function testExpandableBlockQuote(): void
    {
        $result = FormatHelper::expandableBlockQuote('Quote');
        $this->assertEquals('<blockquote expandable>Quote</blockquote>', $result);
    }
}