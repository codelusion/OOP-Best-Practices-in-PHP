<?php

include_once('src/Cart.php');

class App {

    static function checkout() {
        $cart = new Cart;
        $cart->setTaxContext(new StateTaxContext('MN'));
        $cart->setDiscount(new Discount(5.00));
        $p1 = new ProductLineItem(9000, 44.99);
        $p2 = new ProductLineItem(5050, 19.99);
        $cart->addLineItem($p1->setQuantity(3));
        $cart->addLineItem($p2);
        echo "Cart has ({$cart->getLineItemCount()}) line items. Total: {$cart->getTotal()}\n";
    }

}

App::checkout();