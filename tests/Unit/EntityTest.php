<?php

namespace Al3x5\xBot\Tests\Unit;

use Al3x5\xBot\Telegram\Entity;
use PHPUnit\Framework\TestCase;

class DummyEntity extends Entity
{
    protected function setEntities(): array
    {
        return [
            'user' => \Al3x5\xBot\Telegram\Entities\User::class
        ];
    }
}

class EntityTest extends TestCase
{
    public function testConstructorWithEmptyData(): void
    {
        $entity = new DummyEntity([]);
        
        $this->assertInstanceOf(Entity::class, $entity);
        $this->assertEmpty($entity->getProperties());
    }

    public function testMagicGetReturnsProperty(): void
    {
        $data = [
            'update_id' => 123456789,
            'message_id' => 1,
            'text' => 'Hello'
        ];
        
        $entity = new DummyEntity($data);
        
        $this->assertEquals(123456789, $entity->update_id);
        $this->assertEquals(1, $entity->message_id);
        $this->assertEquals('Hello', $entity->text);
    }

    public function testMagicSetSetsProperty(): void
    {
        $entity = new DummyEntity([]);
        $entity->custom_field = 'test_value';
        
        $this->assertEquals('test_value', $entity->custom_field);
    }

    public function testGetPropertiesReturnsAllProperties(): void
    {
        $data = [
            'field1' => 'value1',
            'field2' => 'value2'
        ];
        
        $entity = new DummyEntity($data);
        $props = $entity->getProperties();
        
        $this->assertArrayHasKey('field1', $props);
        $this->assertArrayHasKey('field2', $props);
    }

    public function testHasPropertyReturnsTrueForExistingProperty(): void
    {
        $entity = new DummyEntity(['field' => 'value']);
        
        $this->assertTrue($entity->hasProperty('field'));
    }

    public function testHasPropertyReturnsFalseForNonExistingProperty(): void
    {
        $entity = new DummyEntity(['field' => 'value']);
        
        $this->assertFalse($entity->hasProperty('non_existent'));
    }

    public function testMagicIssetReturnsTrueForExistingProperty(): void
    {
        $entity = new DummyEntity(['field' => 'value']);
        
        $this->assertTrue(isset($entity->field));
    }

    public function testMagicIssetReturnsFalseForNonExistingProperty(): void
    {
        $entity = new DummyEntity(['field' => 'value']);
        
        $this->assertFalse(isset($entity->non_existent));
    }

    public function testJsonSerialize(): void
    {
        $data = [
            'field1' => 'value1',
            'field2' => 'value2'
        ];
        
        $entity = new DummyEntity($data);
        $json = json_encode($entity);
        
        $this->assertJson($json);
    }

    public function testToJson(): void
    {
        $entity = new DummyEntity(['field' => 'value']);
        $json = $entity->toJson();
        
        $this->assertJson($json);
    }

    public function testMagicCallWithGetPrefix(): void
    {
        $data = [
            'message_id' => 123,
            'text' => 'test'
        ];
        
        $entity = new DummyEntity($data);
        
        // Test camelCase to snake_case conversion
        $this->assertEquals(123, $entity->getMessageId());
        $this->assertEquals('test', $entity->getText());
    }

    public function testMagicCallReturnsNullForUnknownProperty(): void
    {
        $entity = new DummyEntity([]);
        
        $result = $entity->getNonExistent();
        $this->assertNull($result);
    }

    public function testMagicCallReturnsNullForNonGetMethods(): void
    {
        $entity = new DummyEntity([]);
        
        $result = $entity->someOtherMethod();
        $this->assertNull($result);
    }
}