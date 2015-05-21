<?php

include_once('Discount.php');
include_once('WholesaleDiscount.php');
include_once('StateTaxContext.php');
include_once('ProductLineItem.php');

class Cart {
    protected $lineItems = array();
    protected $tax = 0;
    protected $discount = 0;
    protected $total = 0.0;
    protected $hasTaxContext = false;

    public function addLineItem(ISaleable $item) {
        $this->lineItems[] = array(
            'id' => $item->getId(),
            'price' => $item->getPrice(),
            'quantity' => $item->getQuantity());
        return count($this->lineItems);
    }

    public function getTotal() {
        $this->total = 0;
        if ($this->hasTaxContext) {
            $this->calculateItemTotal();
            $this->applyDiscounts();
            $this->applyTax();
        } else {
            throw new RuntimeException('Tax context not set');
        }

        return number_format($this->total, 2);
    }

    protected function calculateItemTotal() {
        foreach ($this->lineItems as $item) {
            $this->total += ($item['price'] * $item['quantity']);
        }

    }

    protected function applyDiscounts() {
        if (!empty($this->discount)) {
            $this->total -= $this->discount;
        }
    }

    protected function applyTax() {
        if (!empty($this->tax)) {
            $this->total += ($this->total * $this->tax);
        }
    }


    public function setTaxContext(ITaxContext $taxContext) {
        $this->hasTaxContext = true;
        $this->tax = $taxContext->getTax($this->total);
        return $this;
    }

    public function setDiscount(Discount $discount) {
        $this->discount = $discount->getAmount($this->lineItems);
        return $this;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function getLineItemCount() {
        return count($this->lineItems);
    }

}
