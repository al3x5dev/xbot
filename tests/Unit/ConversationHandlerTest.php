<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Bot;
use Al3x5\xBot\Config;
use Al3x5\xBot\Telegram\Entities\Update;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\Chat;
use Al3x5\xBot\Telegram\Entities\Message;
use PHPUnit\Framework\TestCase;

class ConversationDummy extends Bot
{
    public function __construct(array $config = [])
    {
    }
}

class ConversationHandlerTest extends TestCase
{
    private Update $update;
    private ConversationDummy $helper;
    private \Psr\SimpleCache\CacheInterface $cache;

    protected function setUp(): void
    {
        parent::setUp();

        $reflection = new \ReflectionClass(Config::class);
        $prop = $reflection->getProperty('init');
        $prop->setAccessible(true);
        $prop->setValue(null, null);
        $cfg = $reflection->getProperty('cfg');
        $cfg->setAccessible(true);

        $this->cache = \Mk4U\Cache\CacheFactory::create('file', [
            'dir' => 'storage/cache',
            'ttl' => 600
        ]);

        $cfg->setValue(null, [
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => getcwd(),
            'cache' => $this->cache,
        ]);

        $this->cache->delete('123456:123456');

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
            'text' => 'hello'
        ]);

        $this->update = new Update([
            'update_id' => 123456789,
            'message' => $message
        ]);

        $this->helper = new ConversationDummy();
        $this->helper->update = $this->update;
    }

    private function callPrivate(string $method, ...$args): mixed
    {
        $reflection = new \ReflectionClass(ConversationDummy::class);
        $m = $reflection->getMethod($method);
        $m->setAccessible(true);
        return $m->invoke($this->helper, ...$args);
    }

    public function testIsTalkingReturnsFalseWhenNoConversation(): void
    {
        $result = $this->callPrivate('isTalking');
        $this->assertFalse($result);
    }

    public function testGetDataReturnsEmptyArrayWhenNoConversation(): void
    {
        $data = $this->callPrivate('getData');
        $this->assertIsArray($data);
        $this->assertEmpty($data);
    }

    public function testGetDataReturnsDefaultForNonExistentKey(): void
    {
        $result = $this->callPrivate('getData', 'nonexistent', 'default_value');
        $this->assertEquals('default_value', $result);
    }

    public function testStopConversationDoesNotThrow(): void
    {
        $this->callPrivate('stopConversation');
        $this->assertTrue(true);
    }

    public function testIsTalkingReturnsTrueAfterStoringConversation(): void
    {
        $this->cache->set('123456:123456', [
            'conversation' => 'Bot\Conversations\TestConv',
            'step' => 'start',
            'end' => ['cancel']
        ]);

        $result = $this->callPrivate('isTalking');
        $this->assertTrue($result);

        $this->cache->delete('123456:123456');
    }

    public function testGetDataReturnsStoredData(): void
    {
        $this->cache->set('123456:123456', [
            'conversation' => 'Bot\Conversations\TestConv',
            'step' => 'getName',
            'end' => ['cancel']
        ]);

        $data = $this->callPrivate('getData');
        $this->assertIsArray($data);
        $this->assertEquals('Bot\Conversations\TestConv', $data['conversation']);
        $this->assertEquals('getName', $data['step']);

        $this->cache->delete('123456:123456');
    }

    public function testGetDataReturnsSpecificKey(): void
    {
        $this->cache->set('123456:123456', [
            'conversation' => 'Bot\Conversations\TestConv',
            'step' => 'start',
        ]);

        $step = $this->callPrivate('getData', 'step');
        $this->assertEquals('start', $step);

        $this->cache->delete('123456:123456');
    }

    public function testStopConversationRemovesData(): void
    {
        $this->cache->set('123456:123456', [
            'conversation' => 'Bot\Conversations\TestConv',
            'step' => 'start',
        ]);

        $talking = $this->callPrivate('isTalking');
        $this->assertTrue($talking);

        $this->callPrivate('stopConversation');

        $talking = $this->callPrivate('isTalking');
        $this->assertFalse($talking);
    }
}
