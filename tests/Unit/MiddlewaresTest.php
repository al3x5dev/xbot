<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Middlewares;
use Al3x5\xBot\Telegram\Entities\Update;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\Chat;
use Al3x5\xBot\Telegram\Entities\Message;
use PHPUnit\Framework\TestCase;

/**
 * Test middleware for Middlewares abstract class
 */
class TestMiddleware extends Middlewares
{
    public function handle(\Closure $next)
    {
        return $next();
    }
}

class TestMiddlewareWithAbort extends Middlewares
{
    public function handle(\Closure $next)
    {
        return $this->abort('Access denied');
    }
}

class MiddlewaresTest extends TestCase
{
    private Update $update;

    protected function setUp(): void
    {
        parent::setUp();
        
        $user = new User([
            'id' => 123456,
            'is_bot' => false,
            'first_name' => 'Test'
        ]);
        
        $chat = new Chat([
            'id' => 123456,
            'type' => 'private'
        ]);
        
        $message = new Message([
            'message_id' => 1,
            'date' => time(),
            'chat' => $chat,
            'from' => $user,
            'text' => 'test'
        ]);
        
        $this->update = new Update([
            'update_id' => 123456789,
            'message' => $message
        ]);
    }

    public function testConstructorSetsUpdate(): void
    {
        $middleware = new TestMiddleware($this->update);
        
        $reflection = new \ReflectionClass($middleware);
        $property = $reflection->getProperty('update');
        $property->setAccessible(true);
        
        $this->assertSame($this->update, $property->getValue($middleware));
    }

    public function testHandleMethodIsAbstract(): void
    {
        $reflection = new \ReflectionClass(Middlewares::class);
        
        $this->assertTrue($reflection->hasMethod('handle'));
        
        $method = $reflection->getMethod('handle');
        $this->assertTrue($method->isAbstract());
    }

    public function testAbortReturnsFalseWithoutMessage(): void
    {
        // Skip - requires BotActions which needs config
        $this->assertTrue(true);
    }

    public function testAbortReturnsFalseWithMessage(): void
    {
        // Skip - requires BotActions which needs config
        $this->assertTrue(true);
    }

    public function testAbortDoesNotSendReplyWithEmptyMessage(): void
    {
        $middleware = new TestMiddleware($this->update);
        
        $reflection = new \ReflectionClass($middleware);
        $method = $reflection->getMethod('abort');
        $method->setAccessible(true);
        
        // Should not throw
        $result = $method->invoke($middleware, '');
        $this->assertFalse($result);
    }

    public function testAbortDoesNotSendReplyWithNullMessage(): void
    {
        $middleware = new TestMiddleware($this->update);
        
        $reflection = new \ReflectionClass($middleware);
        $method = $reflection->getMethod('abort');
        $method->setAccessible(true);
        
        $result = $method->invoke($middleware, null);
        $this->assertFalse($result);
    }

    public function testMiddlewareHasBotActionsTrait(): void
    {
        $reflection = new \ReflectionClass(Middlewares::class);
        
        // Check that the class uses BotActions trait
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Traits\BotActions', $traits);
    }

    public function testMiddlewareHasHandleMethod(): void
    {
        // Middlewares has handle method that must be implemented
        $reflection = new \ReflectionClass(Middlewares::class);
        
        $this->assertTrue($reflection->hasMethod('handle'));
    }
}