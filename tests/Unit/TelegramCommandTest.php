<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Commands\TelegramCommandCommand;
use PHPUnit\Framework\TestCase;

class TelegramCommandTest extends TestCase
{
    public function testTelegramCommandClassExists(): void
    {
        $this->assertTrue(class_exists(TelegramCommandCommand::class));
    }

    public function testTelegramCommandExtendsSymfonyCommand(): void
    {
        $reflection = new \ReflectionClass(TelegramCommandCommand::class);
        
        $this->assertTrue($reflection->isSubclassOf(\Symfony\Component\Console\Command\Command::class));
    }

    public function testTelegramCommandIsFinal(): void
    {
        $reflection = new \ReflectionClass(TelegramCommandCommand::class);
        
        $this->assertTrue($reflection->isFinal());
    }

    public function testTelegramCommandHasExecuteMethod(): void
    {
        $reflection = new \ReflectionClass(TelegramCommandCommand::class);
        
        $this->assertTrue($reflection->hasMethod('execute'));
    }

    public function testTelegramCommandHasMakeClassTrait(): void
    {
        $reflection = new \ReflectionClass(TelegramCommandCommand::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Commands\Traits\MakeClass', $traits);
    }
}