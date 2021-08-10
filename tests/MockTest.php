<?php

use PHPUnit\Framework\TestCase;

class MockTest extends TestCase
{
    public function testMock()
    {
        $mailer = $this->createMock(Mailer::class);

        $mailer->method('sendMessage')
            ->willReturn(true);

        $result = $mailer->sendMessage('inf@test.info', 'test text');

        $this->assertTrue($result);
    }
}