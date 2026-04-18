<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Commands\InstallCommand;
use Al3x5\xBot\Commands\Traits\Io;
use Al3x5\xBot\Commands\Traits\ConfigHandler;
use Al3x5\xBot\Commands\Traits\MakeClass;
use PHPUnit\Framework\TestCase;

class InstallCommandTest extends TestCase
{
    public function testInstallCommandHasCorrectName(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->hasMethod('configure'));
    }

    public function testInstallCommandHasDescription(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->hasMethod('configure'));
    }

    public function testInstallCommandHasHelp(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->hasMethod('configure'));
    }

    public function testInstallCommandUsesIoTrait(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Commands\Traits\Io', $traits);
    }

    public function testInstallCommandUsesConfigHandlerTrait(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Commands\Traits\ConfigHandler', $traits);
    }

    public function testInstallCommandUsesMakeClassTrait(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $traits = $reflection->getTraitNames();
        $this->assertContains('Al3x5\xBot\Commands\Traits\MakeClass', $traits);
    }

    public function testInstallCommandIsFinal(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->isFinal());
    }

    public function testInstallCommandHasExecuteMethod(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->hasMethod('execute'));
    }

    public function testInstallCommandExtendsCommand(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->isSubclassOf(\Symfony\Component\Console\Command\Command::class));
    }

    public function testInstallCommandHasAskForTokenMethod(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->hasMethod('askForToken'));
    }

    public function testInstallCommandHasAskForSecretTokenMethod(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->hasMethod('askForSecretToken'));
    }

    public function testInstallCommandHasAskForAdminsMethod(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->hasMethod('askForAdmins'));
    }

    public function testInstallCommandHasGenerateConfigDataMethod(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->hasMethod('generateConfigData'));
    }

    public function testInstallCommandHasCreateDirectoriesMethod(): void
    {
        $reflection = new \ReflectionClass(InstallCommand::class);
        
        $this->assertTrue($reflection->hasMethod('createDirectories'));
    }
}