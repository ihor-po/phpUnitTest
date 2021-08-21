<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testGetAmount()
    {
        $gateway = Mockery::mock('PaymentGateway');

        $order = new Order($gateway);
        $order->setQuantity(3);
        $order->setUnitPrice(1.99);

        $this->assertEquals(5.97, $order->getAmount());
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

        $order->setQuantity(1);
        $order->setUnitPrice(100);

        $this->assertTrue($order->process());
    }

    public function testOrderIsProcessedUsingMockery()
    {

        $gateway = Mockery::mock('PaymentGateway');
        $gateway->shouldReceive('charge')
                ->once()
                ->with(5.97)
                ->andReturn(true);

        $order = new Order($gateway);
        $order->setQuantity(3);
        $order->setUnitPrice(1.99);

        $this->assertTrue($order->process());
    }
}