# Events Logger

The `Events` class provides robust logging capabilities for your xBot application, utilizing the Monolog library under the hood. This documentation covers its usage and configuration.

## Core Functionality

### `logger()` method
```php
public static function logger(
    string $name,
    string $file,
    string $message,
    array $context = [],
    string $level = 'debug'
): void
```

Creates and writes log entries with the following parameters:

| Parameter  | Type   | Description                              | Default      |
|------------|--------|------------------------------------------|--------------|
| `$name`    | string | Log channel name                         | **Required** |
| `$file`    | string | Log filename (stored in `storage/logs/`) | **Required** |
| `$message` | string | Log message content                      | **Required** |
| `$context` | array  | Additional context data                  | `[]`         |
| `$level`   | string | Log severity level                       | `'debug'`    |

## Log Severity Levels

The class supports these severity levels (in descending order of importance):

1. **`emergency`**: System is unusable
2. **`critical`**: Critical conditions
3. **`error`**: Runtime errors
4. **`warning`**: Exceptional occurrences
5. **`info`**: Interesting events
6. **`debug`**: Detailed debug information

## Configuration Features

### Development Mode Formatting
When development mode is enabled in your configuration:
```php
Config::set('dev', true);
```
Logs with channel names starting with "dev" will be formatted as JSON for easier parsing.

### Storage Location
All logs are stored in the `storage/logs/` directory relative to your project root.

## Usage Examples

### Basic Logging
```php
use Al3x5\xBot\Events;

// Simple debug log
Events::logger('app', 'app.log', 'Bot initialized');

// With context data
Events::logger('payment', 'transactions.log', 'Payment processed', [
    'user_id' => 12345,
    'amount' => 29.99,
    'currency' => 'USD'
], 'info');
```

### Development Logging
```php
// JSON-formatted log in dev mode
Events::logger('dev-api', 'api_requests.log', 
    'Received API request',
    ['method' => 'POST', 'endpoint' => '/webhook'],
    'debug'
);
```

## Best Practices

1. **Channel Organization**:
   ```php
   // Use consistent channel names
   Events::logger('db', 'database.log', 'Query executed');
   Events::logger('security', 'auth.log', 'User login');
   ```

2. **Appropriate Log Levels**:
   ```php
   // Use proper severity levels
   Events::logger('app', 'startup.log', 'Critical service failure', [], 'critical');
   Events::logger('app', 'updates.log', 'Received new update', $updateData, 'debug');
   ```

3. **Rich Context**:
   ```php
   Events::logger('orders', 'purchases.log', 'New order', [
       'user' => $user->id,
       'items' => $cart->items,
       'total' => $cart->total,
       'payment_method' => 'credit_card'
   ], 'info');
   ```
