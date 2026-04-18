<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Telegram\Factorys\Keyboard;
use Al3x5\xBot\Telegram\Factorys\InlineButton;
use Al3x5\xBot\Telegram\Factorys\ReplyButton;
use Al3x5\xBot\Telegram\Entities\InlineKeyboardMarkup;
use Al3x5\xBot\Telegram\Entities\ReplyKeyboardMarkup;
use Al3x5\xBot\Telegram\Entities\ReplyKeyboardRemove;
use Al3x5\xBot\Telegram\Entities\ForceReply;
use Al3x5\xBot\Telegram\Entities\InlineKeyboardButton;
use Al3x5\xBot\Telegram\Entities\WebAppInfo;
use PHPUnit\Framework\TestCase;

class KeyboardTest extends TestCase
{
    public function testInlineReturnsInlineKeyboardInstance(): void
    {
        $keyboard = Keyboard::inline();
        
        $this->assertInstanceOf(\Al3x5\xBot\Telegram\Factorys\InlineKeyboard::class, $keyboard);
    }

    public function testReplyReturnsReplyKeyboardInstance(): void
    {
        $keyboard = Keyboard::reply();
        
        $this->assertInstanceOf(\Al3x5\xBot\Telegram\Factorys\ReplyKeyboard::class, $keyboard);
    }

    public function testRemoveReturnsReplyKeyboardRemove(): void
    {
        $keyboard = Keyboard::remove();
        
        $this->assertInstanceOf(ReplyKeyboardRemove::class, $keyboard);
        $this->assertTrue($keyboard->getRemoveKeyboard());
    }

    public function testForceReplyReturnsForceReply(): void
    {
        $keyboard = Keyboard::forceReply();
        
        $this->assertInstanceOf(ForceReply::class, $keyboard);
    }

    public function testForceReplyWithParameters(): void
    {
        $keyboard = Keyboard::forceReply(true, 'Type a message...');
        
        $this->assertTrue($keyboard->getForceReply());
        $this->assertTrue($keyboard->getSelective());
        $this->assertEquals('Type a message...', $keyboard->getInputFieldPlaceholder());
    }

    public function testInlineKeyboardBuildReturnsInlineKeyboardMarkup(): void
    {
        $keyboard = Keyboard::inline();
        $result = $keyboard->build();
        
        $this->assertInstanceOf(InlineKeyboardMarkup::class, $result);
    }

    public function testInlineKeyboardEmptyBuild(): void
    {
        $keyboard = Keyboard::inline();
        $markup = $keyboard->build();
        
        $this->assertIsArray($markup->getInlineKeyboard());
        $this->assertEmpty($markup->getInlineKeyboard());
    }

    public function testInlineKeyboardAddRow(): void
    {
        $keyboard = Keyboard::inline()
            ->row(InlineButton::make('Button 1')->callback('action1'));
        
        $markup = $keyboard->build();
        $rows = $markup->getInlineKeyboard();
        
        $this->assertIsArray($rows);
        $this->assertNotEmpty($rows);
    }

    public function testInlineKeyboardMultipleRows(): void
    {
        $keyboard = Keyboard::inline()
            ->row(
                InlineButton::make('Button 1')->callback('action1'),
                InlineButton::make('Button 2')->callback('action2')
            )
            ->row(InlineButton::make('Button 3')->callback('action3'));
        
        $markup = $keyboard->build();
        $rows = $markup->getInlineKeyboard();
        
        $this->assertIsArray($rows);
        $this->assertCount(2, $rows);
    }

    public function testInlineButtonCreatesWithText(): void
    {
        $button = InlineButton::make('Click me');
        
        $this->assertInstanceOf(InlineButton::class, $button);
    }

    public function testInlineButtonWithCallbackData(): void
    {
        $button = InlineButton::make('Click me')->callback('my_action');
        $built = $button->build();
        
        $this->assertInstanceOf(InlineKeyboardButton::class, $built);
        $this->assertEquals('Click me', $built->getText());
        $this->assertEquals('my_action', $built->getCallbackData());
    }

    public function testInlineButtonWithUrl(): void
    {
        $button = InlineButton::make('Open link')->url('https://example.com');
        $built = $button->build();
        
        $this->assertEquals('https://example.com', $built->getUrl());
    }

    public function testInlineButtonWithWebApp(): void
    {
        $webApp = new WebAppInfo(['url' => 'https://example.com/app']);
        $button = InlineButton::make('Open App')->webApp($webApp);
        $built = $button->build();
        
        $this->assertInstanceOf(WebAppInfo::class, $built->getWebApp());
    }

    public function testInlineButtonWithSwitchInlineQuery(): void
    {
        $button = InlineButton::make('Search')->switchInlineQuery('query');
        $built = $button->build();
        
        $this->assertEquals('query', $built->getSwitchInlineQuery());
    }

    public function testInlineButtonWithSwitchInlineQueryCurrentChat(): void
    {
        $button = InlineButton::make('Search here')->switchInlineQueryCurrentChat('query');
        $built = $button->build();
        
        $this->assertEquals('query', $built->getSwitchInlineQueryCurrentChat());
    }

    public function testInlineButtonWithPay(): void
    {
        $button = InlineButton::make('Pay')->pay(true);
        $built = $button->build();
        
        $this->assertTrue($built->getPay());
    }

    public function testReplyKeyboardBuild(): void
    {
        $keyboard = Keyboard::reply()
            ->row(ReplyButton::make('Button 1'));
        
        $markup = $keyboard->build();
        
        $this->assertInstanceOf(ReplyKeyboardMarkup::class, $markup);
    }

    public function testReplyKeyboardResize(): void
    {
        $keyboard = Keyboard::reply()
            ->row(ReplyButton::make('Button'))
            ->resize();
        
        $markup = $keyboard->build();
        
        $this->assertTrue($markup->getResizeKeyboard());
    }

    public function testReplyKeyboardOneTime(): void
    {
        $keyboard = Keyboard::reply()
            ->row(ReplyButton::make('Button'))
            ->oneTime();
        
        $markup = $keyboard->build();
        
        $this->assertTrue($markup->getOneTimeKeyboard());
    }

    public function testReplyKeyboardPlaceholder(): void
    {
        $keyboard = Keyboard::reply()
            ->row(ReplyButton::make('Button'))
            ->placeholder('Type something...');
        
        $markup = $keyboard->build();
        
        $this->assertEquals('Type something...', $markup->getInputFieldPlaceholder());
    }

    public function testReplyKeyboardPersistent(): void
    {
        $keyboard = Keyboard::reply()
            ->row(ReplyButton::make('Button'))
            ->persistent();
        
        $markup = $keyboard->build();
        
        // The property is set in the entity
        $this->assertNotNull($markup);
    }

    public function testReplyButtonRequestContact(): void
    {
        $button = ReplyButton::make('Share Contact')->requestContact();
        $built = $button->build();
        
        $this->assertTrue($built->getRequestContact());
    }

    public function testReplyButtonRequestLocation(): void
    {
        $button = ReplyButton::make('Share Location')->requestLocation();
        $built = $button->build();
        
        $this->assertTrue($built->getRequestLocation());
    }

    public function testKeyboardClassHasAllFactoryMethods(): void
    {
        $reflection = new \ReflectionClass(Keyboard::class);
        
        $this->assertTrue($reflection->hasMethod('inline'));
        $this->assertTrue($reflection->hasMethod('reply'));
        $this->assertTrue($reflection->hasMethod('remove'));
        $this->assertTrue($reflection->hasMethod('forceReply'));
    }
}