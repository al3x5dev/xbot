<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Bot;
use Al3x5\xBot\Config;
use Al3x5\xBot\Telegram\Actions\Callbacks;
use Al3x5\xBot\Telegram\Actions\Traits\CallbackHandler;
use Al3x5\xBot\Telegram\Entities\Update;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\Chat;
use Al3x5\xBot\Telegram\Entities\Message;
use Al3x5\xBot\Telegram\Entities\CallbackQuery;
use Al3x5\xBot\Telegram\Entities\MaybeInaccessibleMessage;
use PHPUnit\Framework\TestCase;

class CallbackHandlerTestHelper extends Bot
{
    public function __construct(array $config = [])
    {
    }

    public function publicSetCallbacks(string $filename): void
    {
        $this->setCallbacks($filename);
    }

    public function publicHandleCallback(): void
    {
        $this->handleCallback();
    }

    public function publicGetCallbackQuery(): CallbackQuery
    {
        return $this->getCallbackQuery();
    }
}

class TestCallbackHandler extends Callbacks
{
    public $executed = false;

    public function execute(): void
    {
        $this->executed = true;
    }
}

class CallbackHandlerTest extends TestCase
{
    private Update $update;
    private CallbackHandlerTestHelper $helper;
    private string $callbackFile;

    protected function setUp(): void
    {
        parent::setUp();

        $reflection = new \ReflectionClass(Config::class);
        $prop = $reflection->getProperty('init');
        $prop->setAccessible(true);
        $prop->setValue(null, null);
        $cfg = $reflection->getProperty('cfg');
        $cfg->setAccessible(true);

        $cache = \Mk4U\Cache\CacheFactory::create('file', [
            'dir' => 'storage/cache',
            'ttl' => 600
        ]);

        $cfg->setValue(null, [
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => getcwd(),
            'cache' => $cache,
        ]);

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
            'text' => 'test message'
        ]);

        $maybeInaccessibleMessage = new MaybeInaccessibleMessage([
            'message_id' => 1,
            'date' => time(),
            'chat' => $chat,
            'from' => $user,
            'text' => 'test message'
        ]);

        $callbackQuery = new CallbackQuery([
            'id' => 'callback_123',
            'from' => $user,
            'chat_instance' => '123456789',
            'data' => 'test_action',
            'message' => $maybeInaccessibleMessage
        ]);

        $this->update = new Update([
            'update_id' => 123456789,
            'callback_query' => $callbackQuery
        ]);

        $this->helper = new CallbackHandlerTestHelper();
        $this->helper->update = $this->update;

        $this->callbackFile = sys_get_temp_dir() . '/callbacks_test_' . uniqid() . '.json';
    }

    protected function tearDown(): void
    {
        if (file_exists($this->callbackFile)) {
            unlink($this->callbackFile);
        }
        parent::tearDown();
    }

    public function testSetCallbacksThrowsWhenFileNotFound(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('file does not exist');
        $this->helper->publicSetCallbacks('/nonexistent/file.json');
    }

    public function testSetCallbacksLoadsValidJson(): void
    {
        file_put_contents($this->callbackFile, json_encode([
            'test_action' => TestCallbackHandler::class
        ]));

        $this->helper->publicSetCallbacks($this->callbackFile);
        $this->assertTrue(true);
    }

    public function testGetCallbackQueryReturnsCallbackQuery(): void
    {
        $cq = $this->helper->publicGetCallbackQuery();
        $this->assertInstanceOf(CallbackQuery::class, $cq);
        $this->assertEquals('test_action', $cq->getData());
    }

    public function testHandleCallbackThrowsForUnknownAction(): void
    {
        file_put_contents($this->callbackFile, json_encode([
            'other_action' => TestCallbackHandler::class
        ]));

        $this->helper->publicSetCallbacks($this->callbackFile);

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Callback');
        $this->helper->publicHandleCallback();
    }

    public function testCallbackHandlerTraitIsUsedByBot(): void
    {
        $traits = (new \ReflectionClass(Bot::class))->getTraitNames();
        $this->assertContains('Al3x5\xBot\Telegram\Actions\Traits\CallbackHandler', $traits);
    }
}
