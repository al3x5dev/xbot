# Keyboards

One of the coolest things about Telegram Bot API are the new custom keyboards. Whenever your bot sends a message, it can pass along a special keyboard with predefined reply options. Telegram apps that receive the message will display your keyboard to the user. Tapping any of the buttons will immediately send the respective command. This way you can drastically simplify user interaction with your bot.

Telegram currently support text and emoji for your buttons. Here are some custom keyboard examples:
- Keyboard for a poll bot.
- Keyboard for a calculator bot.
- Keyboard for a trivia bot.

## Keyboard Types

There are three types of keyboards:
- `\Al3x5\xBot\Keyboard::simple` - A regular keyboard with reply options.
- `\Al3x5\xBot\Keyboard::remove` - Removes the keyboard for the current chat.
- `\Al3x5\xBot\Keyboard::inline` - A keyboard that appears right next to the message it belongs to.


## `\Al3x5\xBot\Keyboard::simple(array $buttons, bool $resize = true, bool $oneTime = false): string`

Creates a responsive keyboard that is displayed to the user.
Buttons can be plain text or request data such as contact or location.

### Parameters:
- `$buttons`: Two-dimensional array of buttons. Each row is an array of strings (text) or associative arrays (buttons with options).
- `$resize` (optional): If `true`, the keyboard is adjusted vertically. Default: `true`.
- `$oneTime` (optional): If `true`, the keyboard is hidden after use. Default: `false`.

```php

$buttons = [
    [ 'Yes', 'No'],
    ['Send contact', 'Send location']
];

$keyboard = \Al3x5\xBot\Keyboard::simple($buttons, true, true);
```


## `Al3x5\xBot\Keyboard::remove(): string`

Removes the current keyboard and displays the application's default keyboard.

> [!NOTE]
> In the current implementation, it does not support parameters like selective.

```php
$keyboard = \Al3x5\xBot\Keyboard:::remove();
```

## `\Al3x5\xBot\Keyboard:::inline(array $buttons): string`

Creates an inline keyboard that appears next to the message.
Each button can have actions such as opening a URL, sending callback data, etc.

### Parameters:
- `$buttons`: 2-dimensional array representing rows and columns of buttons.

> [!NOTE]
> Each button must be an associative array with properties like `text`, `url`, `callback_data`, etc.

```php

$buttons = [
    [
        ['text' => 'Button 1', 'url' => 'https://exemple.com'],
        ['text' => 'Button 2', 'callback_data' => 'action_2']
    ]
];

$keyboard = \Al3x5\xBot\Keyboard:::inline($buttons);
```


## `\Al3x5\xBot\Keyboard:::forceReply(array $params = []): string`

Forces the user to reply to the current message.
Allows additional parameters to be added as selective.

### Parameters:
- `$params` (optional): Additional configuration (e.g. ['selective' => true]).

```php
$keyboard = \Al3x5\xBot\Keyboard:::forceReply(['selective' => true]);
```


## General Usage

Generated keyboards are passed as reply_markup when sending messages:

```php
$bot->reply(
    [
        'reply_markup' => $keyboard
    ]
);
```