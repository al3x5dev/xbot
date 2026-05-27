<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Bot;
use Al3x5\xBot\Config;
use Al3x5\xBot\Telegram\Entities\Update;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\Chat;
use Al3x5\xBot\Telegram\Entities\Message;
use PHPUnit\Framework\TestCase;

class BotDummy extends Bot
{
    public function __construct(array $config = [])
    {
    }

    public function publicIsAdmin(): bool
    {
        return $this->isAdmin();
    }
}

class BotActionsTest extends TestCase
{
    private Update $update;

    protected function setUp(): void
    {
        parent::setUp();

        $reflection = new \ReflectionClass(Config::class);
        $prop = $reflection->getProperty('init');
        $prop->setAccessible(true);
        $prop->setValue(null, null);
        $cfg = $reflection->getProperty('cfg');
        $cfg->setAccessible(true);
        $cfg->setValue(null, [
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test',
            'admins' => [123456],
            'parse_mode' => 'HTML',
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
            'text' => '/start'
        ]);

        $this->update = new Update([
            'update_id' => 123456789,
            'message' => $message
        ]);
    }

    public function testBotUsesMethodsHandlerTrait(): void
    {
        $traits = (new \ReflectionClass(Bot::class))->getTraitNames();
        $this->assertContains('Al3x5\xBot\Telegram\Actions\Traits\MethodsHandler', $traits);
    }

    public function testGetActiveEntityReturnsMessage(): void
    {
        $reflection = new \ReflectionClass(Bot::class);
        $method = $reflection->getMethod('getActiveEntity');
        $this->assertTrue($method->isPublic());
    }

    public function testIsAdminIsPublicMethod(): void
    {
        $reflection = new \ReflectionClass(Bot::class);
        $method = $reflection->getMethod('isAdmin');
        $this->assertTrue($method->isPublic());
    }

    public function testReplyMethodExists(): void
    {
        $reflection = new \ReflectionClass(Bot::class);
        $this->assertTrue($reflection->hasMethod('reply'));
    }

    public function testExecuteCommandMethodExists(): void
    {
        $reflection = new \ReflectionClass(Bot::class);
        $this->assertTrue($reflection->hasMethod('executeCommand'));
    }

    public function testIsAdminReturnsTrueForConfiguredAdmin(): void
    {
        $bot = new BotDummy();
        $bot->update = $this->update;

        $this->assertTrue($bot->publicIsAdmin());
    }

    public function testIsAdminReturnsFalseForNonAdmin(): void
    {
        $user = new User([
            'id' => 999999,
            'is_bot' => false,
            'first_name' => 'Other'
        ]);

        $chat = new Chat([
            'id' => 999999,
            'type' => 'private'
        ]);

        $message = new Message([
            'message_id' => 2,
            'date' => time(),
            'chat' => $chat,
            'from' => $user,
            'text' => 'hello'
        ]);

        $update = new Update([
            'update_id' => 999999,
            'message' => $message
        ]);

        $bot = new BotDummy();
        $bot->update = $update;

        $this->assertFalse($bot->publicIsAdmin());
    }

    public function testGetAllCommandsMethodExists(): void
    {
        $reflection = new \ReflectionClass(Bot::class);
        $this->assertTrue($reflection->hasMethod('getAllCommands'));
    }
}
