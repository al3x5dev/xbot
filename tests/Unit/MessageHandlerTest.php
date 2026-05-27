<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Bot;
use Al3x5\xBot\Config;
use Al3x5\xBot\Telegram\Actions\Commands;
use Al3x5\xBot\Exceptions\xBotException;
use Al3x5\xBot\Telegram\Actions\Traits\MessageHandler;
use Al3x5\xBot\Telegram\Entities\Update;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\Chat;
use Al3x5\xBot\Telegram\Entities\Message;
use PHPUnit\Framework\TestCase;

class TestMessageCommand extends Commands
{
    public function execute(): void
    {
    }

    public static function description(): string
    {
        return 'Test command for MessageHandler';
    }
}

class MessageHandlerTestHelper extends Bot
{
    public function __construct(array $config = [])
    {
    }

    public function publicSetCommands(string $filename): void
    {
        $this->setCommands($filename);
    }

    public function publicGetCommand(string $name, ?string $default = null): string
    {
        return $this->getCommand($name, $default);
    }
}

class MessageHandlerTest extends TestCase
{
    private string $commandFile;

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

        $this->commandFile = sys_get_temp_dir() . '/commands_test_' . uniqid() . '.json';
    }

    protected function tearDown(): void
    {
        if (file_exists($this->commandFile)) {
            unlink($this->commandFile);
        }
        parent::tearDown();
    }

    public function testSetCommandsThrowsWhenFileNotFound(): void
    {
        $helper = new MessageHandlerTestHelper();
        $this->expectException(xBotException::class);
        $this->expectExceptionMessage('file does not exist');
        $helper->publicSetCommands('/nonexistent/file.json');
    }

    public function testSetCommandsThrowsOnInvalidJson(): void
    {
        file_put_contents($this->commandFile, 'not valid json');
        $helper = new MessageHandlerTestHelper();

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Invalid JSON');
        $helper->publicSetCommands($this->commandFile);
    }

    public function testSetCommandsLoadsValidJson(): void
    {
        file_put_contents($this->commandFile, json_encode([
            '/start' => TestMessageCommand::class,
            '/generic' => TestMessageCommand::class
        ]));

        $helper = new MessageHandlerTestHelper();
        $helper->publicSetCommands($this->commandFile);
        $this->assertTrue(true);
    }

    public function testGetCommandReturnsMatchingCommand(): void
    {
        file_put_contents($this->commandFile, json_encode([
            '/start' => TestMessageCommand::class,
            '/help' => TestMessageCommand::class,
            '/generic' => TestMessageCommand::class
        ]));

        $helper = new MessageHandlerTestHelper();
        $helper->publicSetCommands($this->commandFile);

        $result = $helper->publicGetCommand('/start');
        $this->assertEquals(TestMessageCommand::class, $result);
    }

    public function testGetCommandReturnsDefaultWhenNotFound(): void
    {
        file_put_contents($this->commandFile, json_encode([
            '/generic' => TestMessageCommand::class
        ]));

        $helper = new MessageHandlerTestHelper();
        $helper->publicSetCommands($this->commandFile);

        $result = $helper->publicGetCommand('/unknown', '/generic');
        $this->assertEquals(TestMessageCommand::class, $result);
    }

    public function testGetCommandThrowsWhenNeitherFoundNorDefault(): void
    {
        file_put_contents($this->commandFile, json_encode([
            '/start' => TestMessageCommand::class
        ]));

        $helper = new MessageHandlerTestHelper();
        $helper->publicSetCommands($this->commandFile);

        $this->expectException(xBotException::class);
        $this->expectExceptionMessage('does not exist');
        $helper->publicGetCommand('/unknown', '/nonexistent');
    }

    public function testMessageHandlerTraitIsUsedByBot(): void
    {
        $traits = (new \ReflectionClass(Bot::class))->getTraitNames();
        $this->assertContains('Al3x5\xBot\Telegram\Actions\Traits\MessageHandler', $traits);
    }
}
