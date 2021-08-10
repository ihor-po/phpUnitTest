<?php

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    private $queue;

    private static $staticQueue;

    protected function setUp(): void
    {
        static::$staticQueue->clear();
        
        $this->queue = new Queue();
    }

    public static function setUpBeforeClass():void
    {
        static::$staticQueue = new Queue();
    }

    public static function tearDownAfterClass(): void
    {
        static::$staticQueue = null;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEquals(0, static::$staticQueue->getCount());
    }

    public function testAnItemIsAddedToTheQueue()
    {
        static::$staticQueue->push('green');

        $this->assertEquals(1, static::$staticQueue->getCount());
    }

    public function testAnItemIsRemovedFromTheQueue()
    {
        static::$staticQueue->push('green');
        $item = static::$staticQueue->pop();

        $this->assertEquals(0, static::$staticQueue->getCount());
        $this->assertEquals('green', $item);
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$staticQueue->push('first');
        static::$staticQueue->push('second');

        $this->assertEquals('first', static::$staticQueue->pop());
    }

    public function testMaxNumberOfItemsCanBeAdded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->getCount());
    }

    public function testExeptionThrownWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->expectException(QueueException::class);
        
        $this->queue->push('New Item');
    }

    public function testExeptionReturnExpectedMessageWhenAddingAnItemToAFullQueue()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Queue is full');
        
        $this->queue->push('New Item');
    }
}