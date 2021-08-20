<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessed()
    {
        $gateway = $this->getMockBuilder('PaymentGateway')
                        ->setMethods(['charge'])
                        ->getMock();

        $gateway->expects($this->once())
                ->method('charge')
                ->with(100)
                ->willReturn(true);

        $order = new Order($gateway);

        $order->amount = 100;

        $this->assertTrue($order->process());
    }

    public function testOrderIsProcessedUsingMockery()
    {

        $gateway = Mockery::mock('PaymentGateway');
        $gateway->shouldReceive('charge')
                ->once()
                ->with(100)
                ->andReturn(true);

        $order = new Order($gateway);

        $order->amount = 100;

        $this->assertTrue($order->process());
    }
}