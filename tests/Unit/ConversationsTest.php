<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Conversations;
use Al3x5\xBot\Telegram\Entities\Update;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\Chat;
use Al3x5\xBot\Telegram\Entities\Message;
use PHPUnit\Framework\TestCase;

/**
 * Test conversation for Conversations abstract class
 */
class TestConversation extends Conversations
{
    public function start(): void
    {
        $this->ask('What is your name?', 'getName');
    }

    public function getName(): void
    {
        $this->reply('Hello!');
    }
}

class ConversationsTest extends TestCase
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
        $conversation = new TestConversation($this->update);
        
        $reflection = new \ReflectionClass($conversation);
        $property = $reflection->getProperty('update');
        $property->setAccessible(true);
        
        $this->assertSame($this->update, $property->getValue($conversation));
    }

    public function testStartMethodIsAbstract(): void
    {
        $reflection = new \ReflectionClass(Conversations::class);
        
        $this->assertTrue($reflection->hasMethod('start'));
        $this->assertTrue($reflection->getMethod('start')->isAbstract());
    }

    public function testFallbackMethodExists(): void
    {
        $reflection = new \ReflectionClass(Conversations::class);
        
        $this->assertTrue($reflection->hasMethod('fallback'));
    }

    public function testEndMethodSetsEndWords(): void
    {
        $conversation = new TestConversation($this->update);
        
        $reflection = new \ReflectionClass($conversation);
        $method = $reflection->getMethod('end');
        $method->invoke($conversation, 'cancel', 'exit', 'quit');
        
        $property = $reflection->getProperty('end');
        $property->setAccessible(true);
        
        $endWords = $property->getValue($conversation);
        
        $this->assertContains('cancel', $endWords);
        $this->assertContains('exit', $endWords);
        $this->assertContains('quit', $endWords);
    }

    public function testEndMethodConvertsToLowercase(): void
    {
        $conversation = new TestConversation($this->update);
        
        $reflection = new \ReflectionClass($conversation);
        $method = $reflection->getMethod('end');
        $method->invoke($conversation, 'CANCEL', 'EXIT');
        
        $property = $reflection->getProperty('end');
        $property->setAccessible(true);
        
        $endWords = $property->getValue($conversation);
        
        $this->assertContains('cancel', $endWords);
        $this->assertContains('exit', $endWords);
    }

    public function testConversationsUsesConversationHandlerTrait(): void
    {
        $reflection = new \ReflectionClass(Conversations::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Traits\ConversationHandler', $traits);
    }

    public function testConversationsUsesBotActionsTrait(): void
    {
        $reflection = new \ReflectionClass(Conversations::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Traits\BotActions', $traits);
    }

    public function testSetStepIsProtectedMethod(): void
    {
        $reflection = new \ReflectionClass(Conversations::class);
        
        $method = $reflection->getMethod('setStep');
        $this->assertTrue($method->isProtected());
    }

    public function testAskIsPublicMethod(): void
    {
        $reflection = new \ReflectionClass(Conversations::class);
        
        $method = $reflection->getMethod('ask');
        $this->assertTrue($method->isPublic());
    }
}