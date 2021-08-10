<?php

/**
 * Queue class
 * 
 * A first-in, first-out data structure
 */
class Queue
{
    /**
     * Maximum number of items in the queue
     * @var integer
     */
    public const MAX_ITEMS = 5;

    /** 
     * Queue items
     * @var array 
     */
    protected $items = [];

    /**
     * Add an item to the end of the queue
     *
     * @param mixed $item The item
     * @return void
     */
    public function push($item): void
    {
        if ($this->getCount() === static::MAX_ITEMS) {
            throw new QueueException('Queue is full');
        }
        
        $this->items[] = $item;
    }

    /**
     * Take sn item of the head of the queue
     *
     * @return mixed
     */
    public function pop()
    {
        return array_shift($this->items);
    }

    /**
     * Get the total number of items in the queue
     *
     * @return integer The number of items
     */
    public function getCount(): int
    {
        return count($this->items);
    }

    public function clear()
    {
        $this->items = [];
    }
}