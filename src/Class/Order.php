<?php

/**
 * Order
 * 
 * An example order class
 */
class Order
{

    /**
     * Amount
     *
     * @var integer
     */
    public $amount = 0;

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
        return $this->gateway->charge($this->amount);
    }
}