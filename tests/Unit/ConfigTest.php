<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Config;
use Al3x5\xBot\Exceptions\xBotException;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Reset singleton for each test
        $reflection = new \ReflectionClass(Config::class);
        $property = $reflection->getProperty('init');
        $property->setAccessible(true);
        $property->setValue(null, null);
        
        $cfgProperty = $reflection->getProperty('cfg');
        $cfgProperty->setAccessible(true);
        $cfgProperty->setValue(null, []);
    }

    public function testInitThrowsExceptionWhenTokenIsMissing(): void
    {
        $this->expectException(xBotException::class);
        $this->expectExceptionMessage('Token not defined!');
        
        Config::init([]);
    }

    public function testInitThrowsExceptionWhenTokenIsInvalid(): void
    {
        $this->expectException(xBotException::class);
        $this->expectExceptionMessage('Invalid Token!');
        
        Config::init(['token' => 'invalid_token']);
    }

    public function testInitWithValidToken(): void
    {
        $config = Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test/path'
        ]);
        
        $this->assertInstanceOf(Config::class, $config);
    }

    public function testGetReturnsDefaultValueForNonExistentKey(): void
    {
        Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test/path'
        ]);
        
        $result = Config::get('non_existent_key', 'default_value');
        $this->assertEquals('default_value', $result);
    }

    public function testGetReturnsConfiguredValue(): void
    {
        Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test/path',
            'debug' => true
        ]);
        
        $result = Config::get('debug');
        $this->assertTrue($result);
    }

    public function testHasReturnsTrueForExistingKey(): void
    {
        Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test/path',
            'admins' => [123456]
        ]);
        
        $this->assertTrue(Config::has('admins'));
    }

    public function testHasReturnsFalseForNonExistingKey(): void
    {
        Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test/path'
        ]);
        
        $this->assertFalse(Config::has('non_existent'));
    }

    public function testSecretTokenIsOptional(): void
    {
        $config = Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test/path'
        ]);
        
        $secret = Config::get('secret');
        $this->assertNull($secret);
    }

    public function testSecretTokenCanBeSet(): void
    {
        Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test/path',
            'secret' => 'my_secret_token'
        ]);
        
        $secret = Config::get('secret');
        $this->assertEquals('my_secret_token', $secret);
    }

    public function testValidateTokenWithValidFormat(): void
    {
        $config = Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test/path'
        ]);
        
        $this->assertInstanceOf(Config::class, $config);
    }

    public function testValidateTokenRejectsInvalidFormat(): void
    {
        $this->expectException(xBotException::class);
        $this->expectExceptionMessage('Invalid Token!');
        
        Config::init([
            'token' => 'not_valid_format',
            'abs_path' => '/test/path'
        ]);
    }

    public function testValidateTokenRejectsEmptyToken(): void
    {
        $this->expectException(xBotException::class);
        
        Config::init([
            'token' => '',
            'abs_path' => '/test/path'
        ]);
    }

    public function testAbsPathIsRequired(): void
    {
        $this->expectException(xBotException::class);
        $this->expectExceptionMessage('No absolute path has been defined');
        
        Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz'
        ]);
    }

    public function testDefaultHttpClientIsUsed(): void
    {
        Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test/path'
        ]);
        
        $client = Config::get('http_client');
        $this->assertInstanceOf(\Mk4U\Http\Client::class, $client);
    }

    public function testDefaultCacheIsUsed(): void
    {
        Config::init([
            'token' => '123456789:ABCdefGHI_jklMNOpqRSTUvWxyz',
            'abs_path' => '/test/path'
        ]);
        
        $cache = Config::get('cache');
        $this->assertInstanceOf(\Psr\SimpleCache\CacheInterface::class, $cache);
    }
}