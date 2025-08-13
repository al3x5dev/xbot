# FormatHelper

The `FormatHelper` class provides static methods for applying different formats to text in Telegram messages. These formats include bold, italics, underlines, strikethrough, spoilers, links, user mentions, custom emoji, code blocks, and quotes. This class is useful for formatting messages sent through a Telegram bot, improving their presentation and readability.

## Methods

### bold(string $text): string

Formats the provided text in bold.

```php
$this->reply(FormatHelper::bold('This text will be bold'));
// Output: <b>This text will be bold</b>
```

### italic(string $text): string

Formats the provided text in italics.

```php
$this->reply(FormatHelper::italic('This text will be italic'));
// Output: <i>This text will be italic</i>
```

### underline(string $text): string

Formats the provided text as underlined.

```php
$this->reply(FormatHelper::underline('This text will be underlined'));
// Output: <u>This text will be underlined</u>
```

### strikethrough(string $text): string

Formats the provided text as a strikethrough.

```php
$this->reply(FormatHelper::strikethrough('This text will be strikethrough'));
// Output: <s>This text will be strikethrough</s>
```

### spoiler(string $text): string

Formats the provided text as a spoiler.

```php
$this->reply(FormatHelper::spoiler('This text will be a spoiler'));
// Output: <tg-spoiler>This text will be a spoiler</tg-spoiler>
```

### link(string $text, string $url): string

Formats the provided text as a link.

```php
$this->reply(FormatHelper::link('Click here', 'https://example.com'));
// Output: <a href="https://example.com">Click here</a>
```

### mention(string $text, int $userId): string

Formats the provided text as a user mention.

```php
$this->reply(FormatHelper::mention('@user', 123456789));
// Output: <a href="tg://user?id=123456789">@user</a>
```

### emoji(string $emoji, string $emojiId): string

Formats the provided text as a custom emoji.

```php
$this->reply(FormatHelper::emoji('😊', '1234567890'));
// Output: <tg-emoji emoji-id="1234567890">😊</tg-emoji>
```

### inlineCode(string $text): string

Formats the provided text as inline code.

```php
$this->reply(FormatHelper::inlineCode('inline code'));
// Output: <code>inline code</code>
```

### codeBlock(string $text, string $language = ''): string

Formats the provided text as a code block.

```php
$this->reply(FormatHelper::codeBlock('block code', 'php'));
// Output: <pre><code class="language-php">block code</code></pre>
```

### blockQuote(string $text): string

Formats the provided text as a blockquote.

```php
$this->reply(FormatHelper::blockQuote('This is a blockquote'));
// Output: <blockquote>This is a blockquote</blockquote>
```

### expandableBlockQuote(string $text): string

Formats the provided text as an expandable blockquote.

```php
$this->reply(FormatHelper::expandableBlockQuote('This is an expandable blockquote'));
// Output: <expandable blockquote>This is an expandable blockquote</blockquote>
```

### sanatize(string $text): string

Sanitizes the provided text, escaping HTML special characters.

```php
$this->reply(FormatHelper::sanatize('<script>alert("Hello")</script>'));
// Output: &lt;script&gt;alert(&quot;Hello&quot;)&lt;/script&gt;
```