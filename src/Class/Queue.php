<?php

/**
 * Queue class
 * 
 * A first-in, first-out data structure
 */
class Queue
{
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
        $this->items[] = $item;
    }

    /**
     * Take sn item of the head of the queue
     *
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->items);
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
}