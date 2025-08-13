# Handler System

## What are Telegram handlers?

Handlers process specific types of Telegram updates beyond standard messages and commands. They are designed to manage specialized events that occur in Telegram interactions. While `message` and `callback_query` updates are handled automatically by xBot's command and callback systems, other update types require dedicated handlers.

## Creating handlers

Generate handler scaffolding with:
```bash
php vendor/bin/xbot telegram:handler
```

This creates a new handler in `bot/Handlers/`.

## Basic handler structure

```php
namespace MyBot\Handlers;

use Al3x5\xBot\Handlers;

class ChannelPost extends Handlers
{
    public function execute(): void
    {
        $post = $this->update->getChannelPost();
        $this->reply("New channel post: " . $post->getText());
    }
}
```

## Handler execution flow

xBot routes updates using this resolution logic:
```php
private function resolveHandler(string $type): void
{
    // Convert update type to PascalCase
    $handler = preg_replace_callback('/_([a-z])/', function ($match) {
        return strtoupper($match[1]);
    }, $type);
    
    // Build handler class
    $class = botNamespace() . '\\Handlers\\' . ucfirst($handler);
    (new $class($this->update))->execute();
}
```

## Supported Handler Types

| Handler Class           | Telegram Update Type   | Description                       |
|-------------------------|------------------------|-----------------------------------|
| `ChannelPost.php`       | `channel_post`         | New messages in channels          |
| `EditedChannelPost.php` | `edited_channel_post`  | Edited messages in channels       |
| `MyChatMember.php`      | `my_chat_member`       | Bot's member status changes       |
| `ChatMember.php`        | `chat_member`          | Group member status changes       |
| `Poll.php`              | `poll`                 | Poll state changes                |
| `PollAnswer.php`        | `poll_answer`          | User responses to polls           |
| `ShippingQuery.php`     | `shipping_query`       | Shipping information requests     |
| `PreCheckoutQuery.php`  | `pre_checkout_query`   | Payment confirmation requests     |
| `ChatJoinRequest.php`   | `chat_join_request`    | Requests to join protected groups |
| `InlineQuery.php`       | `inline_query`         | Inline search requests            |
| `ChosenInlineResult.php`| `chosen_inline_result` | Selected inline result            |
| `EditedMessage.php`     | `edited_message`       | Edited messages in private chats  |

> [!NOTE]
> Regular `message` updates are handled by the Command system, and `callback_query` updates are handled by the Callback system.

## Key Features

1. **Automatic Registration**:
   - Handlers are auto-registered when placed in `bot/Handlers/`
   - No manual registration required

2. **Update Access**:
   ```php
   $this->update->getChannelPost();    // Channel posts
   $this->update->getMyChatMember();   // Membership changes
   $this->update->getPoll();           // Active polls
   ```

3. **Response Methods**:
   ```php
   $this->reply("Basic response");
   $this->replyWithDocument('file.pdf');
   $this->answerShippingQuery(true);  // Accept shipping query
   ```

## Best Practices

1. **Single Responsibility**: One handler per update type
2. **Error handling**: Wrap operations in try/catch blocks
3. **Logging**: Implement logging for important events
4. **Naming**: Use descriptive names matching Telegram's update types
5. **Efficiency**: Keep handlers lightweight and delegate complex operations to services

## When to Use Handlers
- Processing channel content
- Handling group membership changes
- Managing payments and shipping
- Tracking poll responses
- Managing group join requests
- Handling inline search results


