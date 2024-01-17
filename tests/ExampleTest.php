// tests/ExampleTest.php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function testTrueAssertsToTrue()
    {
        $this->assertTrue(true);
    }

    public function testFalseAssertsToFalse()
    {
        $this->assertFalse(false);
    }

    public function testAddition()
    {
        $result = 2 + 2;
        $this->assertEquals(4, $result);
    }

    public function testArrayHasKey()
    {
        $data = ['key' => 'value'];
        $this->assertArrayHasKey('key', $data);
    }
}
