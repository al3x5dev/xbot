# Middlewares

## what is a middleware

Middlewares are a mechanism that allows you to intercept and control the execution flow of bot updates before they reach their final handler (commands, messages, callbacks, etc.).

In **xBot**, middlewares act as a pipeline, where each middleware can:

- Allow execution to continue  
- Abort the execution  
- Send a response before stopping the flow  

Middlewares are executed before the final handler and are especially useful for:

- Authorization  
- Logging  
- Rate limiting  
- Validation  
- Global checks (maintenance mode, bans, etc.)

---

## How middlewares work

1. An update is received by the bot  
2. xBot determines:
   - The update type (`message`, `command`, `callback_query`, etc.)
   - The command name (if any)
3. The corresponding middlewares are collected:
   - Global middlewares
   - Type-based middlewares
   - Command-specific middlewares
4. Middlewares are executed as a pipeline
5. If all middlewares pass, the final handler is executed
6. If any middleware aborts, execution stops immediately

---

## Middleware execution order

Middlewares are executed in the following order:

1. Global middlewares  
2. Type-based middlewares  
3. Command-specific middlewares  

All of them are combined into a single execution pipeline.

---

## Middleware base class

Every middleware must extend:

```php
Al3x5\xBot\Middlewares
```

This base class provides:
- Access to the current `Update`
- Bot actions (`reply`, etc.)
- The `abort()` helper method

---

## Creating a middleware

A middleware is a simple class with a single required method: `handle()`.

```php
namespace Bot\Middlewares;

use Al3x5\xBot\Middlewares;

class ExampleMiddleware extends Middlewares
{
    public function handle(\Closure $next)
    {
        // Your logic here

        return $next();
    }
}
```

---

### The `handle()` method

```php
public function handle(\Closure $next)
```

Inside this method you can:
- Call `$next()` to continue execution
- Call `$this->abort()` to stop execution
- Perform checks or side effects before or after `$next()`


### Aborting execution

To stop the execution pipeline, use the `abort()` method.

```php
protected function abort(?string $message = null, array $params = []): bool
```

#### Behavior:
- Stops middleware execution
- Prevents the final handler from running
- Optionally sends a message to the user

Example:

```php
return $this->abort('Access denied');
```

---

## Middleware configuration

Middlewares are configured using a PHP configuration file automatically created during installation:

```bash
php xbot install
```

### Default middleware configuration file

```php

use Bot\Middlewares\UpdateLoggerMiddleware;

return [
    // Global middleware (applies to ALL update types)
    'global' => [
        UpdateLoggerMiddleware::class
    ],

    // Middleware by update TYPE
    'types' => [
        'message' => [],
        'command' => [],
        'callback_query' => [],
        'inline_query' => [],
    ],

    // Middleware by specific COMMAND (without /)
    'commands' => [
    ],
];
```

### Global middlewares

Global middlewares are executed for **every update**, regardless of type.

```php
'global' => [
    UpdateLoggerMiddleware::class
],
```

Use global middlewares for:
- Logging
- Maintenance mode
- Global bans
- Metrics

### Type-based middlewares

Type-based middlewares are executed only for specific update types.

Supported types include:
- message
- command
- callback_query
- inline_query

Example:

```php
'types' => [
    'command' => [
        AdminMiddleware::class
    ]
],
```

### Command-specific middlewares

Command middlewares are executed only for a specific command.

> [!WARNING]
> The command name must be defined without the /.

Example:

```php
'commands' => [
    'start' => AdminMiddleware::class,
],
```


## Example: Admin middleware

```php

namespace Bot\Middlewares;

use Al3x5\xBot\FormatHelper;
use Al3x5\xBot\Middlewares;

class AdminMiddleware extends Middlewares
{
    public function handle(\Closure $next)
    {
        if (!$this->isAdmin()) {
            return $this->abort(
                '🚫 No eres bienvenido aquí ' .
                FormatHelper::mention(
                    $this->update->message->from->first_name,
                    $this->update->message->from->id
                )
            );
        }

        $this->reply(
            '✅ Bienvenido ' .
            FormatHelper::mention(
                $this->update->message->from->first_name,
                $this->update->message->from->id
            )
        );

        return $next();
    }
}
```

## Middleware pipeline behavior
- If a middleware returns `false` or `null`, execution stops
- If a middleware returns `$next()`, execution continues
- Middlewares are executed outer → inner, but evaluated in order


## Best practices
- Keep middlewares small and focused
- Use `abort()` instead of throwing exceptions
- Avoid heavy logic inside middlewares
- Prefer command-specific middlewares over global ones when possible
- Do not modify state unless necessary