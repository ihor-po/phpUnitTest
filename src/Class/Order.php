<?php

/**
 * Order
 * 
 * An example order class
 */
class Order
{
    /**
     * Quantity
     *
     * @var int
     */
    private $quantity;

    /**
     * Unit price
     *
     * @var float
     */
    private $unitPrice;

    /**
     * Amount
     *
     * @var float
     */
    private $amount = 0;

    /**
     * Payment gateway dependency
     *
     * @var PaymentGateway
     */
    protected $gateway;

    public function __construct(PaymentGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function process()
    {
        return $this->gateway->charge($this->getAmount());
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    public function getAmount(): float
    {
        return $this->quantity * $this->unitPrice;
    }
}