# Rich Message Examples

Complete examples of rich messages using the Telegram Bot API 10.2+ format.

All examples assume you have access to `$this->message->chat->id` from a command context.

> [!IMPORTANT]
> `blocks`, `html`, and `markdown` are **mutually exclusive**. Use only one per message. Calling both `->html(...)` and `->markdown(...)` (or also `->block(...)`) will send multiple fields and the API will reject the request.

```php
use Al3x5\xBot\Telegram\Text;
use Al3x5\xBot\Telegram\Factories\RichMessage;
use Al3x5\xBot\Telegram\Factories\Rich\Block;
```

---

## 1. Simple Message

Heading + paragraph + divider:

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Welcome to xBot')))
    ->block(Block::paragraph('This is a simple rich message.'))
    ->block(Block::paragraph(Text::richItalic('Enjoy the new features!')))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 2. Formatted Text

Nested `RichText` entities:

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Notifications'), 1))
    ->block(Block::paragraph([
        Text::richBold('New update! '),
        Text::richItalic('Version 4.6')
    ]))
    ->block(Block::paragraph(
        Text::richSpoiler('This is a spoiler text')
    ))
    ->block(Block::paragraph(
        Text::richCode('composer update')
    ))
    ->block(Block::preformatted(
        Text::richBold('const VERSION = "4.6.0";'),
        'php'
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 3. Table

Table with header, body, footer, borders, and caption:

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Order Summary')))
    ->block(Block::table()
        ->header(['Product', 'Qty', 'Price'])
        ->body([
            ['T-Shirt', '2', '$50'],
            ['Jeans', '1', '$80'],
            ['Shoes', '1', '$120'],
        ])
        ->footer(['Total', '4', '$250'])
        ->bordered()
        ->caption(Text::richBold('Order #12345'))
        ->build()
    )
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 4. Table with Richtext Cells

```php
$message = RichMessage::make()
    ->block(Block::table()
        ->header([Text::richBold('Name'), Text::richBold('Status')])
        ->body([
            [Text::richBold('Alice'), Text::richItalic('Online')],
            [Text::richBold('Bob'), Text::richItalic('Offline')],
        ])
        ->striped()
        ->build()
    )
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 5. List

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Shopping List')))
    ->block(Block::list([
        Block::paragraph(Text::richBold('Fruits') . ': Apples, Bananas'),
        Block::paragraph(Text::richBold('Dairy') . ': Milk, Cheese'),
        Block::paragraph(Text::richBold('Bakery') . ': Bread, Croissants'),
    ]))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 6. Collage

Multiple media blocks arranged as a collage:

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Photo Gallery')))
    ->block(Block::collage(
        [
            Block::photo('AgACAg...photoId1'),
            Block::photo('AgACAg...photoId2'),
            Block::photo('AgACAg...photoId3'),
        ],
        Text::richItalic('Our latest collection'),
        Text::richBold('Gallery 2025')
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

Mixed media collage:

```php
$message = RichMessage::make()
    ->block(Block::collage(
        [
            Block::photo('AgACAg...photoId'),
            Block::video('BAAD...videoId'),
        ]
    ))
    ->block(Block::audio('CQAD...audioId'))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 7. Slideshow

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Product Showcase')))
    ->block(Block::slideshow(
        [
            Block::photo('AgACAg...photo1', Text::richBold('Front view')),
            Block::photo('AgACAg...photo2', Text::richBold('Side view')),
            Block::photo('AgACAg...photo3', Text::richBold('Back view')),
        ],
        Text::richItalic('Swipe to see more')
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 8. Details (Collapsible)

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('FAQ')))
    ->block(Block::details(
        Text::richBold('How to install?'),
        [
            Block::paragraph('Run the following command:'),
            Block::preformatted('composer install', 'bash'),
        ],
        is_open: false
    ))
    ->block(Block::details(
        Text::richBold('How to update?'),
        [
            Block::paragraph('Use composer update:'),
            Block::preformatted('composer update', 'bash'),
        ],
        is_open: true
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 9. Blockquote

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Testimonial')))
    ->block(Block::blockQuote(
        [
            Block::paragraph('Amazing product! Highly recommended.'),
            Block::paragraph(Text::richItalic('Changed my workflow completely.')),
        ],
        Text::richBold('— Happy Customer')
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 10. Pull Quote

```php
$message = RichMessage::make()
    ->block(Block::pullQuote(
        Text::richBold('The best time to plant a tree was 20 years ago. The second best time is now.'),
        Text::richItalic('— Chinese Proverb')
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 11. Photo with Caption

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Product Photo')))
    ->block(Block::photo(
        'AgACAg...photoFileId',
        [Text::richBold('Premium T-Shirt'), "\n", Text::richItalic('$49.99')],
        Text::richBold('Summer Collection 2024')
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 12. Video

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Promo Video')))
    ->block(Block::video(
        'BAAD...videoFileId',
        Text::richBold('Watch our new promo!'),
        Text::richItalic('Duration: 2:30')
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 13. Embedded Map

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Our Location')))
    ->block(Block::map(
        ['latitude' => 40.7128, 'longitude' => -74.0060],
        zoom: 15,
        width: 400,
        height: 300,
        caption: Text::richBold('New York City'),
        credit: Text::richItalic('Main Office')
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 14. Thinking / Typing Block

```php
$message = RichMessage::make()
    ->block(Block::thinking(Text::richItalic('Analyzing your request...')))
    ->build();

$this->sendRichMessageDraft($chatId, $draftId, $message);
```

---

## 15. Math Expression

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('Math Result')))
    ->block(Block::math('E = mc^2'))
    ->block(Block::paragraph(
        Text::richItalic('Einsteins equation')
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 16. Complete Invoice Example

Combines multiple block types in a realistic scenario:

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('INVOICE #INV-2024-001')))
    ->block(Block::table()
        ->header([Text::richBold('Item'), Text::richBold('Qty'), Text::richBold('Price')])
        ->body([
            ['Web Development', '40h', '$2,000'],
            ['UI/UX Design', '20h', '$1,200'],
            ['Hosting (1 year)', '1', '$360'],
        ])
        ->footer([Text::richBold('Total'), '', Text::richBold('$3,560')])
        ->bordered()
        ->striped()
        ->caption(Text::richBold('Payment due within 30 days'))
        ->build()
    )
    ->block(Block::divider())
    ->block(Block::paragraph(
        Text::richBold('Status: ') . Text::richItalic('Pending Payment')
    ))
    ->block(Block::paragraph(
        Text::richBold('Due Date: ') . Text::richDatetime(strtotime('+30 days'))
    ))
    ->block(Block::blockQuote(
        [Block::paragraph('Thank you for your business!')],
        Text::richBold('xBot Team')
    ))
    ->block(Block::divider())
    ->block(Block::footer(
        Text::richItalic('For questions, reply to this message.')
    ))
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 17. RTL Message

```php
$message = RichMessage::make()
    ->block(Block::heading(Text::richBold('مرحباً بكم')))
    ->block(Block::paragraph('هذا نص من اليمين إلى اليسار'))
    ->rtl()
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 18. With HTML Fallback

```php
$message = RichMessage::make()
    ->html('<b>Rich Message</b><i>Fallback for older clients</i>')
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```

---

## 19. With Markdown Fallback

```php
$message = RichMessage::make()
    ->markdown('*Rich Message* _Fallback for older clients_')
    ->build();

$this->sendRichMessage($this->message->chat->id, $message);
```
