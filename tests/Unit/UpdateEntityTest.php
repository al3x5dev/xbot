<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Telegram\Entities\Update;
use Al3x5\xBot\Telegram\Entities\Message;
use Al3x5\xBot\Telegram\Entities\CallbackQuery;
use Al3x5\xBot\Telegram\Entities\InlineQuery;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\Chat;
use PHPUnit\Framework\TestCase;

class UpdateEntityTest extends TestCase
{
    public function testConstructorWithEmptyData(): void
    {
        $update = new Update([]);
        
        $this->assertInstanceOf(Update::class, $update);
        $this->assertNull($update->type());
    }

    public function testTypeReturnsMessage(): void
    {
        $user = new User(['id' => 123, 'is_bot' => false, 'first_name' => 'Test']);
        $chat = new Chat(['id' => 123, 'type' => 'private']);
        $message = new Message([
            'message_id' => 1,
            'date' => time(),
            'chat' => $chat,
            'from' => $user,
            'text' => 'Hello'
        ]);
        
        $update = new Update([
            'update_id' => 123456789,
            'message' => $message
        ]);
        
        $this->assertEquals('message', $update->type());
    }

    public function testTypeReturnsCallbackQuery(): void
    {
        $user = new User(['id' => 123, 'is_bot' => false, 'first_name' => 'Test']);
        
        $callbackQuery = new CallbackQuery([
            'id' => 'callback_123',
            'from' => $user,
            'chat_instance' => '123',
            'data' => 'test'
        ]);
        
        $update = new Update([
            'update_id' => 123456789,
            'callback_query' => $callbackQuery
        ]);
        
        $this->assertEquals('callback_query', $update->type());
    }

    public function testTypeReturnsInlineQuery(): void
    {
        $user = new User(['id' => 123, 'is_bot' => false, 'first_name' => 'Test']);
        
        $inlineQuery = new InlineQuery([
            'id' => 'inline_123',
            'from' => $user,
            'query' => 'search',
            'offset' => ''
        ]);
        
        $update = new Update([
            'update_id' => 123456789,
            'inline_query' => $inlineQuery
        ]);
        
        $this->assertEquals('inline_query', $update->type());
    }

    public function testTypeReturnsNullWhenNoEntities(): void
    {
        $update = new Update([
            'update_id' => 123456789
        ]);
        
        $this->assertNull($update->type());
    }

    public function testUpdateIdIsAccessible(): void
    {
        $update = new Update([
            'update_id' => 123456789
        ]);
        
        $this->assertEquals(123456789, $update->update_id);
    }

    public function testMessageIsAccessible(): void
    {
        $user = new User(['id' => 123, 'is_bot' => false, 'first_name' => 'Test']);
        $chat = new Chat(['id' => 123, 'type' => 'private']);
        $message = new Message([
            'message_id' => 1,
            'date' => time(),
            'chat' => $chat,
            'from' => $user,
            'text' => 'Hello'
        ]);
        
        $update = new Update([
            'update_id' => 123456789,
            'message' => $message
        ]);
        
        $this->assertInstanceOf(Message::class, $update->getMessage());
    }

    public function testGetMessageMethod(): void
    {
        $user = new User(['id' => 123, 'is_bot' => false, 'first_name' => 'Test']);
        $chat = new Chat(['id' => 123, 'type' => 'private']);
        $message = new Message([
            'message_id' => 1,
            'date' => time(),
            'chat' => $chat,
            'from' => $user,
            'text' => 'Hello'
        ]);
        
        $update = new Update([
            'update_id' => 123456789,
            'message' => $message
        ]);
        
        $this->assertInstanceOf(Message::class, $update->getMessage());
    }

    public function testGetCallbackQueryMethod(): void
    {
        $user = new User(['id' => 123, 'is_bot' => false, 'first_name' => 'Test']);
        
        $callbackQuery = new CallbackQuery([
            'id' => 'callback_123',
            'from' => $user,
            'chat_instance' => '123',
            'data' => 'test'
        ]);
        
        $update = new Update([
            'update_id' => 123456789,
            'callback_query' => $callbackQuery
        ]);
        
        $this->assertInstanceOf(CallbackQuery::class, $update->getCallbackQuery());
    }

    public function testGetInlineQueryMethod(): void
    {
        $user = new User(['id' => 123, 'is_bot' => false, 'first_name' => 'Test']);
        
        $inlineQuery = new InlineQuery([
            'id' => 'inline_123',
            'from' => $user,
            'query' => 'search',
            'offset' => ''
        ]);
        
        $update = new Update([
            'update_id' => 123456789,
            'inline_query' => $inlineQuery
        ]);
        
        $this->assertInstanceOf(InlineQuery::class, $update->getInlineQuery());
    }

    public function testHasPropertyReturnsTrue(): void
    {
        $update = new Update([
            'update_id' => 123456789
        ]);
        
        $this->assertTrue($update->hasProperty('update_id'));
    }

    public function testHasPropertyReturnsFalse(): void
    {
        $update = new Update([
            'update_id' => 123456789
        ]);
        
        $this->assertFalse($update->hasProperty('non_existent'));
    }

    public function testUpdateExtendsEntity(): void
    {
        $update = new Update([]);
        
        $this->assertInstanceOf(\Al3x5\xBot\Telegram\Entity::class, $update);
    }

    public function testUpdateEntityMapContainsAllTypes(): void
    {
        $update = new Update([]);
        
        $reflection = new \ReflectionClass($update);
        $method = $reflection->getMethod('setEntities');
        $method->setAccessible(true);
        
        $entities = $method->invoke($update);
        
        // Verify key entity types are mapped
        $this->assertArrayHasKey('message', $entities);
        $this->assertArrayHasKey('callback_query', $entities);
        $this->assertArrayHasKey('inline_query', $entities);
        $this->assertArrayHasKey('edited_message', $entities);
        $this->assertArrayHasKey('channel_post', $entities);
    }
}