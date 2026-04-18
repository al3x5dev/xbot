<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Telegram\ApiClient;
use Al3x5\xBot\Telegram\Entities\Message;
use Al3x5\xBot\Telegram\Entities\User;
use PHPUnit\Framework\TestCase;

class ApiClientTest extends TestCase
{
    public function testConstructorSetsMethodAndParams(): void
    {
        $client = new ApiClient('sendMessage', [
            'chat_id' => 123,
            'text' => 'Hello'
        ]);
        
        // Use reflection to check private properties
        $reflection = new \ReflectionClass($client);
        $methodProp = $reflection->getProperty('method');
        $methodProp->setAccessible(true);
        
        $paramsProp = $reflection->getProperty('params');
        $paramsProp->setAccessible(true);
        
        $this->assertEquals('sendMessage', $methodProp->getValue($client));
        $this->assertArrayHasKey('chat_id', $paramsProp->getValue($client));
    }

    public function testConstructorAddsDefaultParseMode(): void
    {
        $client = new ApiClient('sendMessage', [
            'chat_id' => 123,
            'text' => 'Hello'
        ]);
        
        $reflection = new \ReflectionClass($client);
        $paramsProp = $reflection->getProperty('params');
        $paramsProp->setAccessible(true);
        
        $params = $paramsProp->getValue($client);
        $this->assertEquals('HTML', $params['parse_mode']);
    }

    public function testConstructorUserParseModeOverridesDefault(): void
    {
        $client = new ApiClient('sendMessage', [
            'chat_id' => 123,
            'text' => 'Hello',
            'parse_mode' => 'Markdown'
        ]);
        
        $reflection = new \ReflectionClass($client);
        $paramsProp = $reflection->getProperty('params');
        $paramsProp->setAccessible(true);
        
        $params = $paramsProp->getValue($client);
        $this->assertEquals('Markdown', $params['parse_mode']);
    }

    public function testNormalizeParamsFiltersNullValues(): void
    {
        $client = new ApiClient('sendMessage', [
            'chat_id' => 123,
            'text' => 'Hello',
            'null_param' => null
        ]);
        
        // Access protected method via reflection
        $reflection = new \ReflectionClass($client);
        $method = $reflection->getMethod('normalizeParams');
        $method->setAccessible(true);
        
        $normalized = $method->invoke($client);
        
        $this->assertArrayNotHasKey('null_param', $normalized);
        $this->assertArrayHasKey('chat_id', $normalized);
        $this->assertArrayHasKey('text', $normalized);
    }

    public function testNormalizeParamsEncodesArraysAsJson(): void
    {
        $client = new ApiClient('sendMessage', [
            'chat_id' => 123,
            'reply_markup' => ['inline_keyboard' => [[]]]
        ]);
        
        $reflection = new \ReflectionClass($client);
        $method = $reflection->getMethod('normalizeParams');
        $method->setAccessible(true);
        
        $normalized = $method->invoke($client);
        
        $this->assertIsString($normalized['reply_markup']);
        $this->assertJson($normalized['reply_markup']);
    }

    public function testBuildMultipartCreatesCorrectStructure(): void
    {
        $client = new ApiClient('sendMessage', [
            'chat_id' => 123,
            'text' => 'Hello'
        ]);
        
        $reflection = new \ReflectionClass($client);
        $method = $reflection->getMethod('buildMultipart');
        $method->setAccessible(true);
        
        $multipart = $method->invoke($client);
        
        $this->assertIsArray($multipart);
        // Verify expected keys exist in the multipart array
        $names = array_column($multipart, 'name');
        $this->assertContains('chat_id', $names);
        $this->assertContains('text', $names);
    }

    public function testBuildMultipartHandlesInputFile(): void
    {
        // InputFile extends Entity, so we pass data to constructor
        $inputFile = new \Al3x5\xBot\Telegram\Entities\InputFile(['file' => '/path/to/file.jpg']);
        
        $client = new ApiClient('sendPhoto', [
            'chat_id' => 123,
            'photo' => $inputFile
        ]);
        
        $reflection = new \ReflectionClass($client);
        $method = $reflection->getMethod('buildMultipart');
        $method->setAccessible(true);
        
        $multipart = $method->invoke($client);
        
        // The InputFile should be converted to contents
        $this->assertIsArray($multipart);
    }
}