<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Handlers;
use Al3x5\xBot\Telegram\Entities\Update;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\Chat;
use Al3x5\xBot\Telegram\Entities\Message;
use PHPUnit\Framework\TestCase;

/**
 * Test handler for Handlers abstract class
 */
class TestHandler extends Handlers
{
    public function execute(): void
    {
        // Test implementation
    }
}

class HandlersTest extends TestCase
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
        $handler = new TestHandler($this->update);
        
        $reflection = new \ReflectionClass($handler);
        $property = $reflection->getProperty('update');
        $property->setAccessible(true);
        
        $this->assertSame($this->update, $property->getValue($handler));
    }

    public function testExecuteMethodIsAbstract(): void
    {
        $reflection = new \ReflectionClass(Handlers::class);
        
        $this->assertTrue($reflection->hasMethod('execute'));
        
        $method = $reflection->getMethod('execute');
        $this->assertTrue($method->isAbstract());
    }

    public function testHandlerHasBotActionsTrait(): void
    {
        $reflection = new \ReflectionClass(Handlers::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Traits\BotActions', $traits);
    }

    public function testHandlerCanBeInstantiatedWithUpdate(): void
    {
        $handler = new TestHandler($this->update);
        
        $this->assertInstanceOf(TestHandler::class, $handler);
    }

    public function testExecuteCanBeCalled(): void
    {
        $handler = new TestHandler($this->update);
        
        // Should not throw
        $handler->execute();
        $this->assertTrue(true);
    }

    public function testHandlerHasAccessToUpdate(): void
    {
        $handler = new TestHandler($this->update);
        
        // Access update property via reflection
        $reflection = new \ReflectionClass($handler);
        $property = $reflection->getProperty('update');
        $property->setAccessible(true);
        
        $this->assertInstanceOf(Update::class, $property->getValue($handler));
    }
}