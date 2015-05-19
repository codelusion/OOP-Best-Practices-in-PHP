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
            throw new RuntimeException('Invalid Product');
        }

        return $this;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        if (is_numeric($quantity)) {
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