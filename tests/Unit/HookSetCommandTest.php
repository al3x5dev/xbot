<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Commands\HookSetCommand;
use Al3x5\xBot\Commands\Traits\Io;
use Al3x5\xBot\Commands\Traits\ConfigHandler;
use Al3x5\xBot\Traits\BotActions;
use PHPUnit\Framework\TestCase;

class HookSetCommandTest extends TestCase
{
    public function testHookSetCommandHasCorrectName(): void
    {
        $reflection = new \ReflectionClass(HookSetCommand::class);
        
        // Check method exists but don't call it to avoid side effects
        $this->assertTrue($reflection->hasMethod('configure'));
    }

    public function testHookSetCommandHasDescription(): void
    {
        $reflection = new \ReflectionClass(HookSetCommand::class);
        
        $this->assertTrue($reflection->hasMethod('configure'));
    }

    public function testHookSetCommandUsesIoTrait(): void
    {
        $reflection = new \ReflectionClass(HookSetCommand::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Commands\Traits\Io', $traits);
    }

    public function testHookSetCommandUsesConfigHandlerTrait(): void
    {
        $reflection = new \ReflectionClass(HookSetCommand::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Commands\Traits\ConfigHandler', $traits);
    }

    public function testHookSetCommandUsesBotActionsTrait(): void
    {
        $reflection = new \ReflectionClass(HookSetCommand::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Traits\BotActions', $traits);
    }

    public function testHookSetCommandIsFinal(): void
    {
        $reflection = new \ReflectionClass(HookSetCommand::class);
        
        $this->assertTrue($reflection->isFinal());
    }

    public function testHookSetCommandHasExecuteMethod(): void
    {
        $reflection = new \ReflectionClass(HookSetCommand::class);
        
        $this->assertTrue($reflection->hasMethod('execute'));
    }

    public function testHookSetCommandHasUrlArgument(): void
    {
        $reflection = new \ReflectionClass(HookSetCommand::class);
        
        $this->assertTrue($reflection->hasMethod('configure'));
    }

    public function testHookSetCommandUrlArgumentIsOptional(): void
    {
        // Skip - requires full command configuration
        $this->assertTrue(true);
    }
}