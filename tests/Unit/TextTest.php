<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Config;
use Al3x5\xBot\Telegram\Text;
use PHPUnit\Framework\TestCase;

class TextTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        $reflection = new \ReflectionClass(Config::class);
        $prop = $reflection->getProperty('init');
        $prop->setAccessible(true);
        $prop->setValue(null, null);
        $cfg = $reflection->getProperty('cfg');
        $cfg->setAccessible(true);
        $cfg->setValue(null, [
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test',
            'parse_mode' => 'HTML'
        ]);
    }

    public function testBold(): void
    {
        $result = Text::bold('Hello');
        $this->assertEquals('<b>Hello</b>', $result);
    }

    public function testItalic(): void
    {
        $result = Text::italic('Hello');
        $this->assertEquals('<i>Hello</i>', $result);
    }

    public function testUnderline(): void
    {
        $result = Text::underline('Hello');
        $this->assertEquals('<u>Hello</u>', $result);
    }

    public function testStrikethrough(): void
    {
        $result = Text::strikethrough('Hello');
        $this->assertEquals('<s>Hello</s>', $result);
    }

    public function testSpoiler(): void
    {
        $result = Text::spoiler('Hello');
        $this->assertEquals('<tg-spoiler>Hello</tg-spoiler>', $result);
    }

    public function testLink(): void
    {
        $result = Text::link('Click here', 'https://example.com');
        $this->assertEquals('<a href="https://example.com">Click here</a>', $result);
    }

    public function testMention(): void
    {
        $result = Text::mention('John', 123456);
        $this->assertEquals('<a href="tg://user?id=123456">John</a>', $result);
    }

    public function testEmoji(): void
    {
        $result = Text::emoji('😀', '123456789');
        $this->assertEquals('<tg-emoji emoji-id="123456789">😀</tg-emoji>', $result);
    }

    public function testInlineCode(): void
    {
        $result = Text::inlineCode('code');
        $this->assertEquals('<code>code</code>', $result);
    }

    public function testCodeBlockWithoutLanguage(): void
    {
        $result = Text::codeBlock('code');
        $this->assertEquals('<pre>code</pre>', $result);
    }

    public function testCodeBlockWithLanguage(): void
    {
        $result = Text::codeBlock('code', 'php');
        $this->assertEquals('<pre><code class="language-php">code</code></pre>', $result);
    }

    public function testBlockQuote(): void
    {
        $result = Text::blockQuote('Quote');
        $this->assertEquals('<blockquote>Quote</blockquote>', $result);
    }

    public function testExpandableBlockQuote(): void
    {
        $result = Text::expandableBlockQuote('Quote');
        $this->assertEquals('<blockquote expandable>Quote</blockquote>', $result);
    }

    public function testRichBoldReturnsRichTextBold(): void
    {
        $result = Text::richBold('hello');
        $this->assertInstanceOf(\Al3x5\xBot\Telegram\Entities\RichTextBold::class, $result);
        $this->assertEquals('bold', $result->getType());
    }

    public function testRichItalicReturnsRichTextItalic(): void
    {
        $result = Text::richItalic('hello');
        $this->assertInstanceOf(\Al3x5\xBot\Telegram\Entities\RichTextItalic::class, $result);
        $this->assertEquals('italic', $result->getType());
    }

    public function testRichUrlReturnsRichTextUrl(): void
    {
        $result = Text::richUrl('click', 'https://example.com');
        $this->assertInstanceOf(\Al3x5\xBot\Telegram\Entities\RichTextUrl::class, $result);
        $this->assertEquals('url', $result->getType());
        $this->assertEquals('https://example.com', $result->getUrl());
    }

    public function testRichCodeReturnsRichTextCode(): void
    {
        $result = Text::richCode('echo hello');
        $this->assertInstanceOf(\Al3x5\xBot\Telegram\Entities\RichTextCode::class, $result);
        $this->assertEquals('code', $result->getType());
    }
}
