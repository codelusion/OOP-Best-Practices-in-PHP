<?php

/**
 * Class Cart
 * Illustration of how PHP Classes are used
 * without applying OOP principles
 */
class Cart {

    //public attributes
    //expose internals of class
    public $lineItems = array();
    public $tax = 0;
    public $discount = 0;

    public function addItem($id, $price, $quantity) {
        $this->lineItems[] = array(
            'id' => $id,
            'price' => $price,
            'quantity' => $quantity);
        return count($this->lineItems);
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->lineItems as $item) {
            $total += ($item['price'] * $item['quantity']);
        }
        //validations that distract from flow
        //of logic, must be repeated before
        //every calculation
        if (!empty($this->discount)) {
            $total -= $this->discount;
        }

        if (!empty($this->tax)) {
            $total += ($total * $this->tax);
        }

        return number_format($total,2);
    }
}

$cart = new Cart;
$cart->tax = 0.07;
$cart->discount = 5.00;
//unexpected behavior is possible
//$cart->lineItems = null
$cart->addItem(9000, 44.99, 3);
$cart->addItem(5050, 19.99, 1);

echo "Cart has (" . count($cart->lineItems).  ") line items. Total: {$cart->getTotal()}\n";
