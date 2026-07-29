# Text

The `Text` class provides static methods for applying different formats to text in Telegram messages. These formats include bold, italics, underlines, strikethrough, spoilers, links, user mentions, custom emoji, code blocks, and quotes. This class is useful for formatting messages sent through a Telegram bot, improving their presentation and readability.

> [!WARNING]
> `Text` generates the formatting according to the configuration value of `parse_mode` (default is `'HTML'`).
>
> If you override `parse_mode` in a method's parameters (e.g., `reply($msg, ['parse_mode' => 'MarkdownV2'])`),
> the text formatted by `Text` will *NOT* be automatically adapted—it will continue to use the configuration's formatting.
>
> In that case, you are responsible for ensuring that the text format matches the `parse_mode` you are sending.
>
> **Using `Text` is not recommended when the message's `parse_mode` differs from the globally configured one.**

## Methods

### bold(string $text): string

Formats the provided text in bold.

```php
$this->reply(Text::bold('This text will be bold'));
// Output: <b>This text will be bold</b>
```

### italic(string $text): string

Formats the provided text in italics.

```php
$this->reply(Text::italic('This text will be italic'));
// Output: <i>This text will be italic</i>
```

### underline(string $text): string

Formats the provided text as underlined.

```php
$this->reply(Text::underline('This text will be underlined'));
// Output: <u>This text will be underlined</u>
```

### strikethrough(string $text): string

Formats the provided text as a strikethrough.

```php
$this->reply(Text::strikethrough('This text will be strikethrough'));
// Output: <s>This text will be strikethrough</s>
```

### spoiler(string $text): string

Formats the provided text as a spoiler.

```php
$this->reply(Text::spoiler('This text will be a spoiler'));
// Output: <tg-spoiler>This text will be a spoiler</tg-spoiler>
```

### link(string $text, string $url): string

Formats the provided text as a link.

```php
$this->reply(Text::link('Click here', 'https://example.com'));
// Output: <a href="https://example.com">Click here</a>
```

### mention(string $text, int $userId): string

Formats the provided text as a user mention.

```php
$this->reply(Text::mention('@user', 123456789));
// Output: <a href="tg://user?id=123456789">@user</a>
```

### emoji(string $emoji, string $emojiId): string

Formats the provided text as a custom emoji.

```php
$this->reply(Text::emoji('😊', '1234567890'));
// Output: <tg-emoji emoji-id="1234567890">😊</tg-emoji>
```

### inlineCode(string $text): string

Formats the provided text as inline code.

```php
$this->reply(Text::inlineCode('inline code'));
// Output: <code>inline code</code>
```

### codeBlock(string $text, string $language = ''): string

Formats the provided text as a code block.

```php
$this->reply(Text::codeBlock('block code', 'php'));
// Output: <pre><code class="language-php">block code</code></pre>
```

### time(int $unix, string $format = ''): string

Formats a Unix timestamp for display. Supports multiple format options:

- `w`: Day of the week in the user's language
- `d`: Short date format (e.g., "17.03.22")
- `D`: Long date format (e.g., "17 de marzo de 2022")
- `t`: Short time format (e.g., "22:45")
- `T`: Long time format (e.g., "22:45:00")
- `r`: Relative time from current moment

```php
$this->reply(Text::time(1710691200, 't'));
// Output: <tg-time unix="1710691200" format="t">fecha</tg-time>
```

### blockQuote(string $text): string

Formats the provided text as a blockquote.

```php
$this->reply(Text::blockQuote('This is a blockquote'));
// Output: <blockquote>This is a blockquote</blockquote>
```

### expandableBlockQuote(string $text): string

Formats the provided text as an expandable blockquote.

```php
$this->reply(Text::expandableBlockQuote('This is an expandable blockquote'));
// Output: <blockquote expandable>This is an expandable blockquote</blockquote>
```

---

## Rich Text Formatting (for RichMessage)

These methods return `RichText` entity objects (not strings) for use inside `RichMessage` blocks and tables. They produce the nested JSON structure required by the Telegram Bot API 7.0+ rich message format.

```php
use Al3x5\xBot\Telegram\Text;

$bold = Text::richBold('Bold text');
$italic = Text::richItalic('Italic text');
```

### richBold(string|RichText $text): RichTextBold

```php
Block::heading(Text::richBold('Title'));
```

### richItalic(string|RichText $text): RichTextItalic

```php
Block::paragraph(Text::richItalic('Intro'));
```

### richUnderline(string|RichText $text): RichTextUnderline

### richStrikethrough(string|RichText $text): RichTextStrikethrough

### richSpoiler(string|RichText $text): RichTextSpoiler

### richCode(string|RichText $text): RichTextCode

### richUrl(string|RichText $text, string $url): RichTextUrl

Creates a clickable URL with the given text.

### richEmail(string|RichText $text): RichTextEmailAddress

### richPhone(string|RichText $text): RichTextPhoneNumber

### richMention(string|RichText $text, string $username): RichTextMention

Mentions a user by username.

### richTextMention(string|RichText $text, User|int $user): RichTextTextMention

Mentions a user by their user ID.

### richCustomEmoji(string $emoji, string $id): RichTextCustomEmoji

Inserts a custom emoji by its ID.

### richSubscript(string|RichText $text): RichTextSubscript

### richSuperscript(string|RichText $text): RichTextSuperscript

### richMarked(string|RichText $text): RichTextMarked

### richDatetime(int $unix): RichTextDateTime

Formats a Unix timestamp as a time entity.

### richMath(string $expression): RichTextMathematicalExpression

### richAnchor(string $name): RichTextAnchor

Creates an anchor that can be referenced by `richAnchorLink`.

### richAnchorLink(string|RichText $text, string $anchor): RichTextAnchorLink

Creates a link to a previously defined anchor.

### richReference(string|RichText $text, string $reference): RichTextReference

### richReferenceLink(string|RichText $text, string $reference): RichTextReferenceLink

---

## RichMessage Builder

The `RichMessage` builder creates a `sendRichMessage` payload. It supports rich blocks, HTML/Markdown fallbacks, and RTL direction.

```php
use Al3x5\xBot\Telegram\Factories\RichMessage;
use Al3x5\xBot\Telegram\Factories\Rich\Block;
use Al3x5\xBot\Telegram\Text;

$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Welcome')))
    ->block(Block::paragraph(Text::richItalic('This is a rich message')))
    ->block(Block::divider())
    ->html('<b>Fallback HTML</b>')
    ->rtl()
    ->build();

$this->sendRichMessage($chatId, $message);
```

### make(): RichMessage

Creates a new builder instance.

### block(Entity $block): self

Adds a block (from `Block::*()` factories).

### html(string $html): self

Sets an HTML fallback for clients that don't support rich messages.

### markdown(string $markdown): self

Sets a Markdown fallback.

### rtl(bool $v = true): self

Enables right-to-left rendering.

### build(): InputRichMessage

Builds the message entity ready for `sendRichMessage`.

---

## Rich\Block Factory

Provides static methods to create all 20 rich block types for use with `RichMessage::block()`.

```php
use Al3x5\xBot\Telegram\Factories\Rich\Block;

$msg = RichMessage::make()
    ->block(Block::paragraph('Simple text'))
    ->block(Block::divider())
    ->block(Block::table()->header(['Name', 'Value'])->body([['Item', '$10']])->build())
    ->build();
```

### paragraph(string|RichText|array $text): InputRichBlockParagraph

A paragraph block with formatted text.

### heading(string|RichText|array $text, int $size = 1): InputRichBlockSectionHeading

A section heading. `$size` ranges from 1 (largest) to 6.

### preformatted(string|RichText|array $text, string $language = ''): InputRichBlockPreformatted

Preformatted/code block. Optionally specify the programming language.

### footer(string|RichText|array $text): InputRichBlockFooter

A footer block.

### divider(): InputRichBlockDivider

A horizontal divider line.

### thinking(string|RichText|array $text): InputRichBlockThinking

Animated thinking/typing indicator block.

### blockQuote(array $blocks, string|RichText|null $credit = null): InputRichBlockBlockQuotation

A block quote containing nested blocks. Optional attribution text.

```php
Block::blockQuote([Block::paragraph('Quoted text')], '— Source');
```

### pullQuote(string|RichText|array $text, string|RichText|null $credit = null): InputRichBlockPullQuotation

A pull quote with large stylized text. Optional attribution.

### photo(string $media, string|RichText|null $caption = null, string|RichText|null $credit = null): InputRichBlockPhoto

A photo block. `$media` is the file ID.

### video(string $media, ...): InputRichBlockVideo

### audio(string $media, ...): InputRichBlockAudio

### animation(string $media, ...): InputRichBlockAnimation

### voiceNote(string $media, ...): InputRichBlockVoiceNote

### table(): Table

Returns a `Table` builder instance for constructing table blocks.

### list(array $items): InputRichBlockList

Creates a list block. Each item can be a block or array of blocks.

```php
Block::list([
    Block::paragraph('Item 1'),
    Block::paragraph('Item 2'),
]);
```

### details(string|RichText|array $summary, array $blocks, bool $is_open = false): InputRichBlockDetails

A collapsible details/summary block.

### collage(array $blocks, ...): InputRichBlockCollage

A collage of multiple media blocks.

### slideshow(array $blocks, ...): InputRichBlockSlideshow

A slideshow/carousel of blocks.

### map(array $location, int $zoom = 15, int $width = 300, int $height = 200, ...): InputRichBlockMap

Embedded map. `$location` is `['latitude' => float, 'longitude' => float]`.

### math(string $expression): InputRichBlockMathematicalExpression

Renders a mathematical expression using Telegram's rendering engine.

### anchor(string $name): InputRichBlockAnchor

Creates an anchor point that can be linked to via block anchor links.

---

## Rich\Table Builder

The `Table` builder constructs table blocks for use inside `RichMessage`.

```php
use Al3x5\xBot\Telegram\Factories\Rich\Block;
use Al3x5\xBot\Telegram\Text;

$table = Block::table()
    ->header(['Product', 'Price'])
    ->body([
        ['Shirt', '$25'],
        ['Shoes', '$80'],
    ])
    ->footer(['Total', '$105'])
    ->bordered()
    ->caption(Text::richBold('Order Summary'))
    ->build();
```

### header(array $cells): self

Sets the header row. Each cell can be a string, `RichText` object, or array.

### body(array $rows): self

Sets the body rows. Each row is an array of cells.

### footer(array $cells): self

Sets the footer row.

### bordered(bool $v = true): self

Enables table borders.

### striped(bool $v = true): self

Enables alternating row striping.

### caption(string|RichText|array $caption): self

Sets the table caption.

### build(): InputRichBlockTable

Builds the table block entity.