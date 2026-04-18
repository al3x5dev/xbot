<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Commands\RegisterCommand;
use Al3x5\xBot\Commands\Traits\Io;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;
use PHPUnit\Framework\TestCase;

class RegisterCommandTest extends TestCase
{
    public function testRegisterCommandHasCorrectName(): void
    {
        $command = new RegisterCommand();
        
        $this->assertEquals('register', $command->getName());
    }

    public function testRegisterCommandHasDescription(): void
    {
        $command = new RegisterCommand();
        
        $this->assertEquals('Register commands and callbacks for your bot', $command->getDescription());
    }

    public function testRegisterCommandUsesIoTrait(): void
    {
        $reflection = new \ReflectionClass(RegisterCommand::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Commands\Traits\Io', $traits);
    }

    public function testRegisterCommandIsFinal(): void
    {
        $reflection = new \ReflectionClass(RegisterCommand::class);
        
        $this->assertTrue($reflection->isFinal());
    }

    public function testRegisterCommandHasExecuteMethod(): void
    {
        $reflection = new \ReflectionClass(RegisterCommand::class);
        
        $this->assertTrue($reflection->hasMethod('execute'));
    }

    public function testRegisterCommandHasConfigureMethod(): void
    {
        $reflection = new \ReflectionClass(RegisterCommand::class);
        
        $this->assertTrue($reflection->hasMethod('configure'));
    }

    public function testRegisterCommandExtendsCommand(): void
    {
        $reflection = new \ReflectionClass(RegisterCommand::class);
        
        $this->assertTrue($reflection->isSubclassOf(\Symfony\Component\Console\Command\Command::class));
    }
}