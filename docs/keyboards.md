# Keyboards

One of the coolest things about Telegram Bot API are the new custom keyboards. Whenever your bot sends a message, it can pass along a special keyboard with predefined reply options. Telegram apps that receive the message will display your keyboard to the user. Tapping any of the buttons will immediately send the respective command. This way you can drastically simplify user interaction with your bot.

Telegram currently support text and emoji for your buttons. Here are some custom keyboard examples:
- Keyboard for a poll bot.
- Keyboard for a calculator bot.
- Keyboard for a trivia bot.



## `KeyboarFactory::inline(): InlineKeyboard`

Creates an inline keyboard that appears next to the message.
Each button can have actions such as opening a URL, sending callback data, etc.

```php

use Al3x5\xBot\Telegram\Keyboards\Builder\InlineKeyboard;
use Al3x5\xBot\Telegram\Keyboards\KeyboardFactory;

$keyboard =  KeyboardFactory::inline()
            ->row([
                InlineKeyboard::button('🎮 Games')->callback('game')
            ])
            ->row([
                InlineKeyboard::button('💎 Membership')->callback('gift')
            ])
            ->row([
                InlineKeyboard::button('👥 Community')->callback('groups')
            ])
            ->build();
```


### row(array $buttons): self

Adds a row of buttons to the inline keyboard.

**Parameters:**
- `$buttons` (array): An array of buttons. Each button can be an instance of `InlineButton` or an associative array.

### addRow(array $buttons): self

Alias for the `row` method.

**Parameters:**
- `$buttons` (array): An array of buttons.

### build(): InlineKeyboardMarkup

Builds the inline keyboard and returns an instance of `InlineKeyboardMarkup`.

### button(string $text): InlineButton

Static method that creates a new inline button with the provided text.

**Parameters:**
- `$text` (string): The button's text.

#### InlineButton::url(string $url): self

Sets the URL to which the user will be redirected when the button is pressed.

**Parameters:**
- `$url` (string): The URL to which the user will be redirected.

#### InlineButton::callback(string $data): self

Sets the callback data to be sent when the button is pressed.

**Parameters:**
- `$data` (string): The callback data to be sent.

#### InlineButton::webApp(WebAppInfo $webAppInfo): self

Sets the web application information to be opened when the button is pressed.

**Parameters:**
- `$webAppInfo` (WebAppInfo): A `WebAppInfo` instance that defines the web application information.

#### InlineButton::loginUrl(LoginUrl $loginUrl): self

Sets the login URL to open when the button is pressed.

**Parameters:**
- `$loginUrl` (LoginUrl): A `LoginUrl` instance that defines the login URL.

#### InlineButton::switchInlineQuery(string $query): self

Sets the inline query to run when the button is pressed.

**Parameters:**
- `$query` (string): The inline query to run.

#### InlineButton::switchInlineQueryCurrentChat(string $query): self

Sets the inline query to run in the current chat when the button is pressed.

**Parameters:**
- `$query` (string): The inline query to run.

#### InlineButton::switchInlineQueryChosenChat(SwitchInlineQueryChosenChat $chosenChat): self

Sets the inline query to be executed on the selected chat when the button is pressed.

**Parameters:**
- `$chosenChat` (SwitchInlineQueryChosenChat): A `SwitchInlineQueryChosenChat` instance that defines the inline query.

#### InlineButton::copyText(CopyTextButton $copyText): self

Sets the text to be copied when the button is pressed.

**Parameters:**
- `$copyText` (CopyTextButton): A `CopyTextButton` instance that defines the text to be copied.

#### InlineButton::callbackGame(CallbackGame $callbackGame): self

Sets the callback game that will open when the button is pressed.

**Parameters:**
- `$callbackGame` (CallbackGame): A `CallbackGame` instance that defines the callback game.

#### InlineButton::pay(bool $value = true): self

Sets whether the button should be used to make a payment.

**Parameters:**
- `$value` (bool): If `true`, the button will be used to make a payment. The default is `true`.

#### InlineButton::build(): InlineKeyboardButton

Builds the inline button and returns an instance of `InlineKeyboardButton`.


## `KeyboarFactory::reply(): ReplyKeyboard`

This static method creates a new instance of `ReplyKeyboard`, which is used to build responsive keyboards in Telegram.


```php

use Al3x5\xBot\Telegram\Keyboards\Builder\ReplyKeyboard;
use Al3x5\xBot\Telegram\Keyboards\KeyboardFactory;

$keyboard = KeyboardFactory::reply()->row([
            ReplyKeyboard::button('📞 Contact')->requestContact()
        ])
        ->row([
            ReplyKeyboard::button('📍 Location')->requestLocation(),
        ])
        ->resize()
        ->oneTime()
        ->build();
```
### Methods

#### row(array $buttons): self

Adds a row of buttons to the keyboard.

**Parameters:**
- `$buttons` (array): An array of buttons. Each button can be an instance of `ReplyButton` or a string.

### addRow(array $buttons): self

Alias for the `row` method.

**Parameters:**
- `$buttons` (array): An array of buttons.

### persistent(bool $value = true): self

Sets whether the keyboard should be persistent.

**Parameters:**
- `$value` (bool): If `true`, the keyboard will be persistent. The default is `true`.

### resize(bool $value = true): self

Sets whether the keyboard should be resized.

**Parameters:**
- `$value` (bool): If `true`, the keyboard will be resized. Default is `true`.

### oneTime(bool $value = true): self

Sets whether the keyboard should be hidden after use.

**Parameters:**
- `$value` (bool): If `true`, the keyboard will be hidden after use. Default is `true`.

### placeholder(string $text): self

Sets the placeholder text for the input field.

**Parameters:**
- `$text` (string): The placeholder text.

### selective(bool $value = true): self

Sets whether the keyboard should be selective.

**Parameters:**
- `$value` (bool): If `true`, the keyboard will be selective. Default is `true`.

### build(): ReplyKeyboardMarkup

Builds the keyboard and returns a ReplyKeyboardMarkup instance.

### button(string $text): ReplyButton

Static method that creates a new reply button with the provided text.

**Parameters:**
- `$text` (string): The button's text.

#### ReplyButton::requestUsers(KeyboardButtonRequestUsers $request): self

Sets the user request for the button.

**Parameters:**
- `$request` (KeyboardButtonRequestUsers): An instance of `KeyboardButtonRequestUsers` that defines the user request.

#### ReplyButton::requestChat(KeyboardButtonRequestChat $request): self

Sets the chat request for the button.

**Parameters:**
- `$request` (KeyboardButtonRequestChat): A `KeyboardButtonRequestChat` instance that defines the chat request.

#### ReplyButton::requestContact(bool $value = true): self

Sets whether the button should request the user's contact information.

**Parameters:**
- `$value` (bool): If `true`, the button will request the user's contact information. Defaults to `true`.

#### ReplyButton::requestLocation(bool $value = true): self

Sets whether the button should request the user's location.

**Parameters:**
- `$value` (bool): If `true`, the button will request the user's location. Defaults to `true`.

#### ReplyButton::requestPoll(KeyboardButtonPollType $pollType): self

Sets the poll request for the button.

**Parameters:**
- `$pollType` (KeyboardButtonPollType): A `KeyboardButtonPollType` instance that defines the poll type.

#### ReplyButton::webApp(WebAppInfo $webAppInfo): self

Sets the web application information for the button.

**Parameters:**
- `$webAppInfo` (WebAppInfo): A `WebAppInfo` instance that defines the web application information.


## `KeyboarFactory::remove(): ReplyKeyboardRemove`

This static method creates a new instance of `ReplyKeyboardRemove`, which is used to remove the current reply keyboard in Telegram. The method returns a `ReplyKeyboardRemove` instance with the `remove_keyboard` option set to `true`.

```php
$keyboard = \Al3x5\xBot\Keyboard:::remove();
```


## `KeyboardFactory:::forceReply((bool $selective = false, string $placeholder = ''): ForceReply`

This static method creates a new instance of `ForceReply`, which is used to force a response from the user in Telegram. It accepts two optional parameters:
- `$selective`: A Boolean value indicating whether the forced response should be selective. Defaults to `false`.
- `$placeholder`: A text string to use as a placeholder in the input field. Defaults to an empty string.

```php

use Al3x5\xBot\Telegram\Keyboards\KeyboardFactory;

$keyboard = KeyboardFactory::forceReply(true, 'Hello xBot');
```