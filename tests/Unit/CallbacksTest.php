<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Callbacks;
use Al3x5\xBot\Telegram\Entities\CallbackQuery;
use Al3x5\xBot\Telegram\Entities\Update;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\Chat;
use Al3x5\xBot\Telegram\Entities\Message;
use Al3x5\xBot\Telegram\Entities\MaybeInaccessibleMessage;
use PHPUnit\Framework\TestCase;

/**
 * Test callback for Callbacks abstract class
 */
class TestCallback extends Callbacks
{
    public function execute(): void
    {
        // Test implementation
    }
}

class CallbacksTest extends TestCase
{
    private Update $update;
    private CallbackQuery $callbackQuery;

    protected function setUp(): void
    {
        parent::setUp();
        
        $user = new User([
            'id' => 123456,
            'is_bot' => false,
            'first_name' => 'Test',
            'username' => 'testuser'
        ]);
        
        $chat = new Chat([
            'id' => 123456,
            'type' => 'private',
            'first_name' => 'Test'
        ]);
        
        $message = new Message([
            'message_id' => 1,
            'date' => time(),
            'chat' => $chat,
            'from' => $user,
            'text' => 'Test message'
        ]);
        
        $maybeInaccessibleMessage = new MaybeInaccessibleMessage([
            'message_id' => 1,
            'date' => time(),
            'chat' => $chat,
            'from' => $user,
            'text' => 'Test message'
        ]);
        
        $this->callbackQuery = new CallbackQuery([
            'id' => 'callback_123',
            'from' => $user,
            'chat_instance' => '123456789',
            'data' => 'test_action',
            'message' => $maybeInaccessibleMessage
        ]);
        
        $this->update = new Update([
            'update_id' => 123456789,
            'callback_query' => $this->callbackQuery
        ]);
    }

    public function testConstructorSetsCallbackQuery(): void
    {
        $callback = new TestCallback($this->update);
        
        $this->assertInstanceOf(CallbackQuery::class, $callback->callback);
    }

    public function testConstructorSetsMessage(): void
    {
        $callback = new TestCallback($this->update);
        
        $this->assertInstanceOf(MaybeInaccessibleMessage::class, $callback->message);
    }

    public function testCallbackQueryHasData(): void
    {
        $callback = new TestCallback($this->update);
        
        $this->assertEquals('test_action', $callback->callback->getData());
    }

    public function testCallbackQueryHasId(): void
    {
        $callback = new TestCallback($this->update);
        
        $this->assertEquals('callback_123', $callback->callback->getId());
    }

    public function testMessageMethodReturnsResolvedMessage(): void
    {
        $callback = new TestCallback($this->update);
        
        $resolvedMessage = $callback->message();
        
        $this->assertInstanceOf(Message::class, $resolvedMessage);
    }

    public function testExecuteIsAbstract(): void
    {
        $reflection = new \ReflectionClass(Callbacks::class);
        
        $this->assertTrue($reflection->hasMethod('execute'));
        
        $method = $reflection->getMethod('execute');
        $this->assertTrue($method->isAbstract());
    }

    public function testCallbackHasAccessToFrom(): void
    {
        $callback = new TestCallback($this->update);
        
        $this->assertInstanceOf(User::class, $callback->callback->getFrom());
        $this->assertEquals(123456, $callback->callback->getFrom()->getId());
    }

    public function testCallbackHasAccessToChatInstance(): void
    {
        $callback = new TestCallback($this->update);
        
        $this->assertEquals('123456789', $callback->callback->getChatInstance());
    }
}