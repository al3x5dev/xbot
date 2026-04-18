<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Exceptions\xBotException;
use PHPUnit\Framework\TestCase;

class EventsTest extends TestCase
{
    public function testLevelValidationThrowsExceptionForInvalidLevel(): void
    {
        $this->expectException(xBotException::class);
        $this->expectExceptionMessage('Incorrect Log level');
        
        // Use reflection to test the private level method
        $reflection = new \ReflectionClass(\Al3x5\xBot\Events::class);
        $method = $reflection->getMethod('level');
        $method->setAccessible(true);
        
        $events = new \Al3x5\xBot\Events();
        $method->invoke($events, 'invalid_level');
    }

    public function testLevelValidationAcceptsValidLevels(): void
    {
        $reflection = new \ReflectionClass(\Al3x5\xBot\Events::class);
        $method = $reflection->getMethod('level');
        $method->setAccessible(true);
        
        $events = new \Al3x5\xBot\Events();
        
        $this->assertEquals('emergency', $method->invoke($events, 'emergency'));
        $this->assertEquals('critical', $method->invoke($events, 'critical'));
        $this->assertEquals('error', $method->invoke($events, 'error'));
        $this->assertEquals('warning', $method->invoke($events, 'warning'));
        $this->assertEquals('info', $method->invoke($events, 'info'));
        $this->assertEquals('debug', $method->invoke($events, 'debug'));
    }

    public function testLevelValidationIsCaseSensitive(): void
    {
        $this->expectException(xBotException::class);
        
        $reflection = new \ReflectionClass(\Al3x5\xBot\Events::class);
        $method = $reflection->getMethod('level');
        $method->setAccessible(true);
        
        $events = new \Al3x5\xBot\Events();
        $method->invoke($events, 'ERROR'); // uppercase should fail
    }
}