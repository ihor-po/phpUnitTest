<?php

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testAddingTwoPlusTwoResultsInFour()
    {
        $this->assertEquals(4, 2 + 2);
    }
}