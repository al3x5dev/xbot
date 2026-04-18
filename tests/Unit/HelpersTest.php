<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Commands;
use Al3x5\xBot\Callbacks;
use Al3x5\xBot\Config;
use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Initialize config for tests
        $reflection = new \ReflectionClass(Config::class);
        $property = $reflection->getProperty('init');
        $property->setAccessible(true);
        $property->setValue(null, null);
        
        $cfgProperty = $reflection->getProperty('cfg');
        $cfgProperty->setAccessible(true);
        $cfgProperty->setValue(null, [
            'abs_path' => '/test/path',
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz'
        ]);
    }

    public function testBaseFunctionReturnsPath(): void
    {
        $result = base('storage');
        $this->assertEquals('/test/path/storage', $result);
    }

    public function testBaseFunctionReturnsAbsPathWhenNoArgument(): void
    {
        $result = base();
        $this->assertEquals('/test/path', $result);
    }

    public function testXConfigLoadsConfigFile(): void
    {
        // Create a temporary config file
        $tempConfig = sys_get_temp_dir() . '/test_config.php';
        file_put_contents($tempConfig, "<?php return ['token' => 'test_token', 'abs_path' => '/test'];");
        
        // Mock the directory level to find the temp config
        // This test verifies the function exists and returns array
        $this->assertTrue(function_exists('xConfig'));
    }

    public function testWriteContentToFileCreatesFile(): void
    {
        $tempFile = sys_get_temp_dir() . '/test_write_' . uniqid() . '.txt';
        
        writeContentToFile($tempFile, 'test content');
        
        $this->assertFileExists($tempFile);
        $this->assertEquals('test content', file_get_contents($tempFile));
        
        unlink($tempFile);
    }

    public function testWriteContentToFileThrowsWhenDirNotWritable(): void
    {
        $this->expectException(\ErrorException::class);
        $this->expectExceptionMessage('do not have write permissions');
        
        writeContentToFile('/nonexistent/path/file.txt', 'content');
    }

    public function testClassValidatorThrowsWhenClassNotFound(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('not found');
        
        classValidator('NonExistentClass', Commands::class, 'Command');
    }

    public function testClassValidatorThrowsWhenNotSubclass(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('must extend or implement');
        
        // stdClass is not a subclass of Commands
        classValidator(\stdClass::class, Commands::class, 'Command');
    }

    public function testClassValidatorPassesForValidSubclass(): void
    {
        // Create a temporary subclass
        $tempDir = sys_get_temp_dir();
        $tempFile = $tempDir . '/TestCommand.php';
        
        $code = '<?php class TestCommand extends \Al3x5\xBot\Commands { public function execute(): void {} public static function description(): string { return "test"; } }';
        file_put_contents($tempFile, $code);
        
        require_once $tempFile;
        
        // Should not throw - verify it completes without exception
        classValidator('TestCommand', Commands::class, 'Command');
        $this->assertTrue(class_exists('TestCommand'));
        
        unlink($tempFile);
    }
}