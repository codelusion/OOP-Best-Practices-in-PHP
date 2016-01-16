<?php

include_once('src/Cart.php');

/**
 * Class App
 * Illustrating how classes are meant to
 * encapsulate functionality making the
 * flow of logic more comprehensible
 */
class App {

    static function checkout() {
        $cart = new Cart(new StateTaxContext('MN'));
        $p1 = new ProductLineItem(9000, 44.99);
        $p2 = new ProductLineItem(5050, 19.99);
        $cart->addLineItem($p1->setQuantity(3));
        $cart->addLineItem($p2);
        $cart->setDiscount(new Discount(5.00));
        echo "Cart has ({$cart->getLineItemCount()}) line items. Total: {$cart->getTotal()}\n";
    }

}

App::checkout();
