<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Bot;
use Al3x5\xBot\Telegram\Actions\Middlewares;
use Al3x5\xBot\Telegram\Entities\Update;
use Al3x5\xBot\Telegram\Entities\User;
use Al3x5\xBot\Telegram\Entities\Chat;
use Al3x5\xBot\Telegram\Entities\Message;
use PHPUnit\Framework\TestCase;

class MiddlewareDummy extends Bot
{
    public function __construct(array $config = [])
    {
    }
}

class TestPassMiddleware extends Middlewares
{
    public function handle(\Closure $next)
    {
        return $next();
    }
}

class TestAbortMiddleware extends Middlewares
{
    public function handle(\Closure $next)
    {
        return false;
    }
}

class MiddlewareHandlerTest extends TestCase
{
    private Update $update;
    private MiddlewareDummy $helper;

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

        $this->helper = new MiddlewareDummy();
        $this->helper->update = $this->update;
    }

    private function callPrivate(string $method, ...$args): mixed
    {
        $reflection = new \ReflectionClass(MiddlewareDummy::class);
        $m = $reflection->getMethod($method);
        $m->setAccessible(true);
        return $m->invoke($this->helper, ...$args);
    }

    private function setMiddlewares(array $middlewares): void
    {
        $reflection = new \ReflectionClass(MiddlewareDummy::class);
        $parent = $reflection->getParentClass();
        $prop = $parent->getProperty('middlewares');
        $prop->setAccessible(true);
        $prop->setValue($this->helper, $middlewares);
    }

    public function testNormalizeToArrayWithString(): void
    {
        $result = $this->callPrivate('normalizeToArray', 'single_middleware');
        $this->assertEquals(['single_middleware'], $result);
    }

    public function testNormalizeToArrayWithArray(): void
    {
        $result = $this->callPrivate('normalizeToArray', ['mw1', 'mw2']);
        $this->assertEquals(['mw1', 'mw2'], $result);
    }

    public function testNormalizeToArrayWithNull(): void
    {
        $result = $this->callPrivate('normalizeToArray', null);
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testNormalizeToArrayWithInt(): void
    {
        $result = $this->callPrivate('normalizeToArray', 42);
        $this->assertIsArray($result);
        $this->assertEmpty($result);
    }

    public function testExecutePipelineWithoutMiddlewares(): void
    {
        $executed = false;
        $this->callPrivate('executePipeline', [], function () use (&$executed) {
            $executed = true;
        });
        $this->assertTrue($executed);
    }

    public function testExecutePipelineWithPassMiddleware(): void
    {
        $executed = false;
        $this->callPrivate('executePipeline', [TestPassMiddleware::class], function () use (&$executed) {
            $executed = true;
        });
        $this->assertTrue($executed);
    }

    public function testExecutePipelineWithAbortMiddleware(): void
    {
        $executed = false;
        $this->callPrivate('executePipeline', [TestAbortMiddleware::class], function () use (&$executed) {
            $executed = true;
        });
        $this->assertFalse($executed);
    }

    public function testGetMiddlewareForReturnsGlobalMiddlewares(): void
    {
        $this->setMiddlewares([
            'global' => ['TestGlobalMw']
        ]);

        $result = $this->callPrivate('getMiddlewareFor', 'message');
        $this->assertContains('TestGlobalMw', $result);
    }

    public function testGetMiddlewareForReturnsTypeMiddlewares(): void
    {
        $this->setMiddlewares([
            'types' => ['message' => ['TestTypeMw']]
        ]);

        $result = $this->callPrivate('getMiddlewareFor', 'message');
        $this->assertContains('TestTypeMw', $result);
    }

    public function testGetMiddlewareForReturnsCommandMiddlewares(): void
    {
        $this->setMiddlewares([
            'commands' => ['/start' => 'TestCmdMw']
        ]);

        $result = $this->callPrivate('getMiddlewareFor', 'message', '/start');
        $this->assertContains('TestCmdMw', $result);
    }

    public function testGetMiddlewareForMergesAllLevels(): void
    {
        $this->setMiddlewares([
            'global' => ['GlobalMw'],
            'types' => ['message' => ['TypeMw']],
            'commands' => ['/start' => ['CmdMw']]
        ]);

        $result = $this->callPrivate('getMiddlewareFor', 'message', '/start');
        $this->assertContains('GlobalMw', $result);
        $this->assertContains('TypeMw', $result);
        $this->assertContains('CmdMw', $result);
    }

    public function testBotUsesMiddlewareHandlerTrait(): void
    {
        $traits = (new \ReflectionClass(Bot::class))->getTraitNames();
        $this->assertContains('Al3x5\xBot\Telegram\Actions\Traits\MiddlewareHandler', $traits);
    }
}
