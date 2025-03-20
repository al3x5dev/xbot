# Available Methods & Examples


## Send a Message

See `sendMessage` [docs](https://core.telegram.org/bots/api#sendmessage) for a list of supported parameters and other info.

```php
$response = $bot->sendMessage([
    'chat_id' => 'CHAT_ID',
    'text' => 'Hello World'
]);
```


## Reply a Message

`Reply` es una abreviacion de `sendMessage` en el que no se especifica el destino del mensaje.
See `sendMessage` [docs](https://core.telegram.org/bots/api#sendmessage) for a list of supported parameters and other info.

```php
$response = $bot->reply('Hello World',[]);
```


## Forward a Message

See `forwardMessage` [docs](https://core.telegram.org/bots/api#forwardmessage) for a list of supported parameters and other info.

```php
$response = $bot->forwardMessage([
    'chat_id' => 'CHAT_ID',
    'from_chat_id' => 'FROM_CHAT_ID',
    'message_id' => 'MESSAGE_ID'
]);
```


## Send a Photo

See `sendPhoto` [docs](https://core.telegram.org/bots/api#sendphoto) for a list of supported parameters and other info.

```php
$response = $bot->sendPhoto([
	'chat_id' => 'CHAT_ID',
	'photo' => 'path/to/photo.jpg',
	'caption' => 'Some caption'
]);
```


## Send a Chat Action

See `sendChatAction` [docs](https://core.telegram.org/bots/api#sendchataction) for a list of supported actions and other info.

```php
$bot->sendChatAction([
	'chat_id' => 'CHAT_ID',
	'action' => 'upload_photo'
]);
```


## Get Updates

See `getUpdates` [docs](https://core.telegram.org/bots/api#getupdates) for a list of supported parameters and other info.

```php
$updates = $bot->getUpdates();
```