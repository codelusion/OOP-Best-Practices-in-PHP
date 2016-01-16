<?php

include_once('ISaleable.php');

class ProductLineItem implements ISaleable {
    protected $id;
    protected $quantity;
    protected $price;

    function __construct($id, $price) {
        if ($id > 0 && is_numeric($price) && $price > 0) {
            $this->id = $id;
            $this->price = $price;
            $this->quantity = 1;
        } else {
            throw new RuntimeException('Invalid Product ID or price');
        }

        return $this;
    }

    public function getPrice() {
        return $this->price;
    }
    //use setters and getters rather than expose class internals
    public function getQuantity() {
        return $this->quantity;
    }

    //checks and validations are enforced
    //so that instantiated classes are always
    //in a usable state or throw errors
    public function setQuantity($quantity) {
        if (is_numeric($quantity) && $quantity > 0) {
            $this->quantity = $quantity;
        } else {
            throw new RuntimeException('Invalid quantity');
        }

        return $this;
    }

    public function getId() {
        return $this->id;
    }
}