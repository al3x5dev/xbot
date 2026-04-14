# Available Methods


This library is compatible with telegram bot api [version 9.5](https://core.telegram.org/bots/api#february-9-2026).

> [!IMPORTANT]
> In this section, we'll only cover a few available methods; feel free to check out the [Telegram documentation](https://core.telegram.org/bots/api) for more information.



## Entity System

xBot uses an entity-based system for Telegram API responses. All API responses are automatically mapped to entity objects.

### Available Entities

The library includes entities for all Telegram Bot API objects:

| Category | Entities |
|----------|----------|
| Messages | `Message`, `MessageId`, `EditedMessage`, `ChannelPost` |
| Users | `User`, `UserProfilePhotos` |
| Chats | `Chat`, `ChatInviteLink`, `ChatMember`, `ChatFullInfo` |
| Inline Queries | `InlineQuery`, `InlineQueryResultArticle`, `InlineQueryResultPhoto`, etc. |
| Payments | `Invoice`, `PreCheckoutQuery`, `ShippingQuery` |
| Media | `PhotoSize`, `Video`, `Audio`, `Document`, `Sticker` |
| And many more... |

### Using Entities

```php
// Send a message and get the response as an entity
$message = $this->sendMessage([
    'chat_id' => $chatId,
    'text' => 'Hello!'
]);

// Now you can use entity methods
$messageId = $message->getMessageId();
$chat = $message->getChat();
$date = $message->getDate();

// Access properties directly
$messageId = $message->message_id;
$text = $message->text;
```

### Magic Getters

Entities support magic getters for easy property access:

```php
$message = new Message([
    'message_id' => 123,
    'text' => 'Hello',
    'chat' => ['id' => 456, 'type' => 'private']
]);

// These are equivalent:
$message->getMessageId();  // Magic getter (camelCase)
$message->message_id;      // Direct property access
$message->get('message_id'); // Get method
```

### Nested Entities

Entities can contain other entities:

```php
$message = $this->sendMessage([...]);

// Access nested entities
$chat = $message->getChat();       // Returns Chat entity
$user = $message->getFrom();       // Returns User entity
$date = $message->getDate();       // Returns integer

// Access properties
$chatId = $message->chat->getId();
$username = $message->from->getUsername();
```

## xBot Methods


### Reply a Message

`reply` is an abbreviation of `sendMessage` in which the message destination is not specified.
See `sendMessage` [docs](https://github.com/alexsandrov16/xbot/blob/main/docs/example.md#send-a-message).

```php
$response = $bot->reply('Hello World',[]);
```


### Is Admin

`isAdmin` checks if the user is in the list of bot administrators. This list is the one defined in the `admins` configuration parameter.

```php
if($bot->isAdmin()){
    $bot->reply('Hello admin');
}
```


### Get Commands list

`getCommandsList` returns a list of commands that the bot can execute.

```php
$message = '';
foreach($bot->getCommandsList() as $command => $description){
    $message .= "$command: $description\n";
}
$bot->reply($message);
```


### Execute Command

`executeCommand` executes a command passed as a parameter.

```php
$bot->executeCommand('/help');
```


## Telegram Methods


### Send a Message

See `sendMessage` [docs](https://core.telegram.org/bots/api#sendmessage) for a list of supported parameters and other info.

```php
$response = $bot->sendMessage([
    'chat_id' => 'CHAT_ID',
    'text' => 'Hello World'
]);
```


### Forward a Message

See `forwardMessage` [docs](https://core.telegram.org/bots/api#forwardmessage) for a list of supported parameters and other info.

```php
$response = $bot->forwardMessage([
    'chat_id' => 'CHAT_ID',
    'from_chat_id' => 'FROM_CHAT_ID',
    'message_id' => 'MESSAGE_ID'
]);
```


### Send a Photo

See `sendPhoto` [docs](https://core.telegram.org/bots/api#sendphoto) for a list of supported parameters and other info.

```php
$response = $bot->sendPhoto([
    'chat_id' => 'CHAT_ID',
    'photo' => 'path/to/photo.jpg',
    'caption' => 'Some caption'
]);
```


### Send a Chat Action

See `sendChatAction` [docs](https://core.telegram.org/bots/api#sendchataction) for a list of supported actions and other info.

```php
$bot->sendChatAction([
    'chat_id' => 'CHAT_ID',
    'action' => 'upload_photo'
]);
```