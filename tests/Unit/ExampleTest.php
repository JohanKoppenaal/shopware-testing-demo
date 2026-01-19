<?php

declare(strict_types=1);

namespace Tests\Unit;

use Codeception\Test\Unit;
use Tests\Support\UnitTester;

class ExampleTest extends Unit
{
    protected UnitTester $tester;

    public function testArrayOperations(): void
    {
        $array = ['shopware', 'testing', 'demo'];

        $this->assertContains('testing', $array);
        $this->assertCount(3, $array);
    }

    public function testStringOperations(): void
    {
        $version = 'Shopware 6.7';

        $this->assertStringContainsString('6.7', $version);
        $this->assertStringStartsWith('Shopware', $version);
    }

    public function testBasicMath(): void
    {
        $result = 2 + 2;

        $this->assertEquals(4, $result);
        $this->assertIsInt($result);
    }
}
