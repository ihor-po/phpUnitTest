<?php

use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
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
}