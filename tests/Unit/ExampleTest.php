<?php

declare(strict_types=1);

namespace Tests\Unit;

use Codeception\Test\Unit;
use Tests\Support\UnitTester;

class ExampleTest extends Unit
{
    protected UnitTester $tester;

    public function testArrayContainsValue(): void
    {
        $array = ['foo', 'bar', 'baz'];
        
        $this->assertContains('bar', $array);
        $this->assertCount(3, $array);
    }

    public function testStringOperations(): void
    {
        $string = 'Hello Shopware';
        
        $this->assertStringContainsString('Shopware', $string);
        $this->assertEquals(14, strlen($string));
    }
}
